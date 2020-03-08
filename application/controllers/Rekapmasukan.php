<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
class Rekapmasukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0 && $this->session->userdata('level') != 2) redirect("dasbor");
        $this->load->model('Masukan_model');
        $logs = $this->Masukan_model->logs();
    }
    public function index()
    {
        $masukan = $this->Masukan_model;
        $data["tahunajarans"]=$masukan->getTahunAjaran();
        $data['masukans'] = $masukan->getAll();
        $data['title'] = "Data Masukan";
        $this->load->view('masukan/content',$data);


    }
    public function hapus($id=null)
    {
        $masukan = $this->Masukan_model;
        if(isset($id)){
            $masukan->hapus($id);
            redirect('rekapmasukan');
        }
    }
    public function cetak($type=null)
    {
        $model = $this->Masukan_model;
        $data['masukans'] = $model->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('rekapmasukan');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('masukan/cetak_rekap',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Masukan.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:E1')
                    ->setCellValue('A2', 'Data Masukan')
                    ->mergeCells('A2:E2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Tanggal')
                    ->setCellValue('C5','Nomor Induk')
                    ->setCellValue('D5','Nama')
                    ->setCellValue('E5','Masukan');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);  
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["masukans"] as $masukan) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,date("d F Y",strtotime($masukan["created_at"])))
                        ->setCellValue('C'.$row,$masukan["wargabelajar_nomor_induk"])
                        ->setCellValue('D'.$row,$masukan["wargabelajar_nama"])
                        ->setCellValue('E'.$row,$masukan["masukan"]);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Masukan '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Masukan.xlsx"');
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