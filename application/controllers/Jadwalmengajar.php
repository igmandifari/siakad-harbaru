<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
class Jadwalmengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 3) redirect("dasbor");

        $this->load->model('Jadwalmengajar_model');
    }

    public function index()
    {
        $jadwalmengajar = $this->Jadwalmengajar_model;
        
        $data["all_jadwal_mengajar"] = $jadwalmengajar->getJadwalByIdTutor();
        $data["title"] = "Daftar Jadwal Mengajar";
        $data["actor"] ="Jadwal Mengajar";
        $data["tahunajarans"] = $jadwalmengajar->getTahunAjaran();

        $this->load->view('tutor/jadwalmengajar',$data);
    }
    public function cetak($type=null)
    {
        $model = $this->Jadwalmengajar_model;
        $tahun = $this->session->userdata('tahunajaran_id');
        $data['jadwals'] = $model->getJadwal($tahun);

        if(!isset($type)){
            redirect('jadwalmengajar');
        }elseif ($type != "xlsx" && $type !="pdf") {
            redirect('jadwalmengajar');
        }elseif($type=="pdf"){
            
            
            // $this->load->view('jadwal/cetak',$data);
            $style = file_get_contents(base_url('assets/css/report.css'));
            $cetak = $this->load->view('jadwal/cetak',$data,TRUE);
            $jadwal= new \Mpdf\Mpdf();
            $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
            $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
            $jadwal->Output('Jadwal Pelajaran Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
            
        }elseif($type=="xlsx"){
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet();
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'PKBM Harapan Baru')
                ->mergeCells('A1:H1')
                ->setCellValue('A2', 'Jadwal Pelajaran')
                ->mergeCells('A2:H2')
                ->setCellValue('A5','NO')
                ->setCellValue('B5','Tahun Ajaran')
                ->setCellValue('C5','Kelas')
                ->setCellValue('D5','Tipe Pembelajaran')
                ->setCellValue('E5','Mata Pelajaran')
                ->setCellValue('F5','Tutor')
                ->setCellValue('G5','Hari')
                ->setCellValue('H5','Waktu');

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
            foreach ($data["jadwals"] as $jadwal) {
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'.$row,$n)
                    ->setCellValue('B'.$row,$this->session->userdata('tahunajaran_nama'))
                    ->setCellValue('C'.$row,$jadwal->kelas_nama)
                    ->setCellValue('D'.$row,$jadwal->jadwal_tipe_pembelajaran)
                    ->setCellValue('E'.$row,$jadwal->matpel_nama)
                    ->setCellValue('F'.$row,$jadwal->tutor_nama)
                    ->setCellValue('G'.$row,$jadwal->jadwal_hari)
                    ->setCellValue('H'.$row,$jadwal->jadwal_waktu);
                $row++;
                $n++;
            }
              
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
    }
}