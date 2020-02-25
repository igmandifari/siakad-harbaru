<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
    class Presensi extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);
            if($this->session->userdata('level') != 3) redirect("dasbor");

            $this->load->model('Presensi_model');
        }

        public function index()
        {
            // if(!isset($kelas)){
            $presensi = $this->Presensi_model;

            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Presensi Kehadiran";
            $data["SemuaKelas"] = $presensi->getKelas();
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            
            $this->load->view('tutor/presensi/list',$data);
        }
        public function presensi_baru(){
            $presensi=$this->Presensi_model;
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            if($this->input->method()=="post"){
                $jadwal_id =$this->input->post('jadwal_id');
                $presensi_id = $this->input->post('presensi_id');
                $presensi->NewPresensi();
                $wargabelajars = $presensi->getSiswaByRombel($jadwal_id);
                foreach($wargabelajars as $wargabelajar){
                $presensi->PresensiDet(array(
                    'presensi_id'       => $presensi_id,
                    'wargabelajar_id'   => $wargabelajar->wargabelajar_id,
                    'presensi_det_ket'  => 'A',
                    'updated_at'        => date('Y-m-d H:i:s')
                ));
                }
                redirect('presensi/jadwal/'.$jadwal_id.'/'.$presensi_id);
            }else{
                redirect('presensi');
            }
        }
        public function jadwal($id=null,$pertemuan=null,$type=null){
            if(!isset($id)) redirect('presensi');

            $presensi = $this->Presensi_model;
            $data["kelas"] = $presensi->getNameKelas($id);
            $data["title"] = "Kelas";
            $data["actor"] = "Presensi";
            $data["wargabelajars"] = $presensi->getPresensiDet($pertemuan);
            $data["tahunajarans"]= $presensi->getTahunAjaran();
            $data["pertemuans"]=$presensi->getPertemuan($id);
            
            if(!isset($pertemuan) && isset($id)){
                $this->load->view('tutor/presensi/pertemuan',$data);
            }elseif(!$data["wargabelajars"]){
                redirect('presensi/jadwal/'.$this->uri->segment(3));
            }elseif(isset($data["wargabelajars"])){
                $data['tanggal']=$presensi->getTanggal($pertemuan);
                $this->load->view('tutor/presensi/presensi',$data);
                if($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tutor/presensi/cetak_pertemuan',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Rekap Presensi '.$data['kelas']['matpel_nama'].' '.date("d,F Y",strtotime($data['tanggal']['presensi_tanggal'])).'.pdf', 'D');
                
                }elseif($type=="xlsx"){

                }
            }               
        }
        
        public function update_presensi_det(){
            $presensi= $this->Presensi_model;
            if($this->input->method()=="post"){
                $presensi->updatePresensiDet(array(
                'presensi_det_ket'  => $this->input->post('status'),
                'updated_at'        => date('Y-m-d H:i:s')
                ),$this->input->post('id'));
            }
        }
        
        public function details($jadwal=null,$type=null){
            if(!isset($jadwal)) redirect('presensi');
            $details = $this->Presensi_model;
            $idpresensi=$details->getIDPresensi($jadwal);
            $data["wargabelajars"] = $details->getWb($idpresensi["presensi_id"]);
            $wargabelajars = $data["wargabelajars"];
            $data["title"] = "Rekap Presensi";
            $data["kelas"] = $details->getNameKelas($jadwal);
            $data["actor"] = $data["kelas"]["kelas_nama"];
            $data["details"] = $this->Presensi_model;
            $data["tahunajarans"]= $details->getTahunAjaran();
            if($type=="pdf"){
                
                
                // $this->load->view('tutor/presensi/cetak',$data);
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('tutor/presensi/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Rekap Presensi '.$data['kelas']['matpel_nama'].' '.$data['kelas']['kelas_nama'].' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $tanggal = $details->getDate($jadwal);
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:H1')
                    ->setCellValue('A2', 'Rekap Presensi '.$data["kelas"]["matpel_nama"].' '.$data["kelas"]["kelas_nama"].' '.$this->session->userdata('tahunajaran_nama'))
                    ->mergeCells('A2:H2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Tanggal')
                    ->setCellValue('C5','Nomor Induk')
                    ->setCellValue('D5','Nama')
                    ->setCellValue('E5','Hadir')
                    ->setCellValue('F5','Izin')
                    ->setCellValue('G5','Sakit')
                    ->setCellValue('H5','Tanpa Keterangan');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["wargabelajars"] as $wargabelajar) {
                    foreach ($tanggal as $tgl) {
                        $keterangan = $details->getDetailBanget($tgl->id,$wargabelajar->id);
                        if($keterangan['ket']=="H"){
                            $hadir = "1";
                        }else{$hadir="";}
                        if($keterangan['ket']=="S"){
                            $sakit = "1";
                        }else{
                            $sakit ="";
                        }if($keterangan['ket']=="I"){
                            $izin = "1";
                        }else{
                            $izin ="";
                        }if($keterangan['ket']=="A"){
                            $alpa ="1";
                        }else{
                            $alpa="";
                        }
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$row,$n)
                            ->setCellValue('B'.$row,date("d F H",strtotime($tgl->tanggal)))
                            ->setCellValue('C'.$row,$wargabelajar->wargabelajar_nomor_induk)
                            ->setCellValue('D'.$row,$wargabelajar->wargabelajar_nama)
                            ->setCellValue('E'.$row,$hadir)
                            ->setCellValue('F'.$row,$sakit)
                            ->setCellValue('G'.$row,$izin)
                            ->setCellValue('H'.$row,$alpa);
                        $row++;
                        $n++;
                    }
                }
                $ndata = $row - 1;
                $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A'.$row,"Total")
                            ->mergeCells('A'.$row.':D'.$row)
                            ->setCellValue('E'.$row,'=sum(E6:E'.$ndata.')')
                            ->setCellValue('F'.$row,'=sum(F6:F'.$ndata.')')
                            ->setCellValue('G'.$row,'=sum(G6:G'.$ndata.')')
                            ->setCellValue('H'.$row,'=sum(H6:H'.$ndata.')');
                  
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Jadwal Pelajaran '.date('d-m-Y'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Jadwal Pelajaran Tahun '.$this->session->userdata('tahunajaran_nama').'.xlsx"');
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
            $this->load->view('tutor/presensi/rekap',$data);
        }
        public function hapus($jadwal=null,$id=null){
            if(!isset($id)) redirect('presensi');
            $model = $this->Presensi_model;

            $details = $model->hapus_details($id);
            if($details){
                $presensi=$model->hapus($id);
                $this->session->set_flashdata('success',"berhasil");
                redirect('presensi/jadwal/').$jadwal;
            }
        }
       
        
    }