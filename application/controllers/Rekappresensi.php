<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
    class Rekappresensi extends CI_Controller
    {
    	public function __construct()
    	{
    		parent::__construct();
        	$url=base_url();
        
        	if($this->session->userdata('MASUK') != TRUE)redirect($url);
	        if($this->session->userdata('level') != 1) redirect("dasbor");

	        $this->load->model('Rekappresensi_model');
        }
        public function index()
        {
            $model = $this->Rekappresensi_model;
            // tahun ajaran id
            $tahun = $this->session->userdata('tahunajaran_id');
            $data["tahunajarans"] = $model->getTahunAjaran();
            // warga belajar id
            $wb_id = $this->session->userdata('id');
            $data['jadwals'] = $model->getJadwal($wb_id,$tahun);
            $data['model']=$model;
            $data['title']='Rekap Presensi';
            $data['wb_id']=$wb_id;

            $this->load->view('dasbor/wargabelajar/presensi',$data,FALSE);
        }
        public function cetak($type=null)
        {
            $model = $this->Rekappresensi_model;
            $tahun = $this->session->userdata('tahunajaran_id');
            // warga belajar id
            $wb_id = $this->session->userdata('id');
            $data['jadwals'] = $model->getJadwal($wb_id,$tahun);
            $data['model']=$model;
            $data['wb_id']=$wb_id;

            if(!isset($type)){
                redirect('rekappresensi');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('rekappresensi');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('dasbor/wargabelajar/cetak_rekappresensi',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Rekap Presensi '.$this->session->userdata('induk').' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:G1')
                    ->setCellValue('A2', 'Rekap Presensi')
                    ->mergeCells('A2:G2')
                    ->setCellValue('A3','Nomor Induk')
                    ->setCellValue('A4','Nama')
                    ->setCellValue('A5','Tahun Ajaran')
                    ->setCellValue('B3',': '.$this->session->userdata('induk'))
                    ->setCellValue('B4',': '.$this->session->userdata('nama'))
                    ->setCellValue('B5',': '.$this->session->userdata('tahunajaran_nama'))
                    ->setCellValue('A6','NO')
                    ->mergeCells('A6:A7')
                    ->setCellValue('B6','Mata Pelajaran')
                    ->mergeCells('B6:B7')
                    ->setCellValue('C6','Keterangan')
                    ->mergeCells('C6:G6')
                    ->setCellValue('C7','Hadir')
                    ->setCellValue('D7','Sakit')
                    ->setCellValue('E7','Izin')
                    ->setCellValue('F7','Tanpa Keterangan')
                    ->setCellValue('G7','Pertemuan');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                

                // Parsing data from database
                $row = 8;
                $n = 1;
                $alpa=0;
                $hadir=0;
                $izin=0;
                $sakit=0;
                $pertemuan=0;
                foreach ($data["jadwals"] as $jadwal) {
                    $presensi = $model->getPresensi($jadwal['jadwal_id']);
                    foreach($presensi as $prs){
                        $Countalpa = $model->getAlpa($wb_id,$prs['presensi_id']);
                        $Counthadir = $model->getHadir($wb_id,$prs['presensi_id']);
                        $Countizin = $model->getIzin($wb_id,$prs['presensi_id']);
                        $Countsakit = $model->getSakit($wb_id,$prs['presensi_id']);
                        $Countpertemuan = $model->getPertemuan($jadwal['jadwal_id']);

                        $alpa+=$Countalpa['alpa'];
                        $hadir+=$Counthadir['hadir'];
                        $izin+=$Countizin['izin'];
                        $sakit+=$Countsakit['sakit'];
                        $pertemuan=+$Countpertemuan['pertemuan'];
                        
                    }                    
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$jadwal['matpel_nama'])
                        ->setCellValue('C'.$row,$hadir)
                        ->setCellValue('D'.$row,$sakit)
                        ->setCellValue('E'.$row,$izin)
                        ->setCellValue('F'.$row,$alpa)
                        ->setCellValue('G'.$row,$pertemuan);
                    $row++;
                    $n++;
                    $alpa=0;
                    $hadir=0;
                    $izin=0;
                    $sakit=0;
                    $pertemuan=0;
                }

                $ndata = $row - 1;

                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$row, 'Total')
                    ->mergeCells('A'.$row.':B'.$row)
                    ->setCellValue('C'.$row, '=sum(C8:C'.$row.')')
                    ->setCellValue('D'.$row, '=sum(D8:D'.$row.')')
                    ->setCellValue('E'.$row, '=sum(E8:E'.$row.')')
                    ->setCellValue('F'.$row, '=sum(F8:F'.$row.')')
                    ->setCellValue('G'.$row, '=sum(G8:G'.$row.')');
                  
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Presensi '.date('d-m-Y'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Rekap Presensi '.$this->session->userdata('induk').' Tahun '.$this->session->userdata('tahunajaran_nama').'.xlsx"');
                header('Cache-Control: max-age=0');
                // If you're serving to IE 9, then the following may be needed
                header('Cache-Control: max-age=1');

                // If you're serving to IE over SSL, then the following may be needed
                header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
                header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                header('Pragma: public'); // HTTP/1.0

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                $writer->save('php://output');
                exit;
            }
        }
    }