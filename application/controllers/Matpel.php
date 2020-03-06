<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
class Matpel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Matpel_model');
        $this->load->library('form_validation'); 
        $this->load->helper('security');
        $logs = $this->Matpel_model->logs(); 
    }

    public function index()
    {
        $data["matpels"] = $this->Matpel_model->getAll();
        $data["title"] = "Data Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();

        $this->load->view('matpel/list',$data);
    }

    public function tambah()
    {
        $matpel = $this->Matpel_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($matpel->rules());

        if ($validasi->run()){
            $matpel->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            
            redirect("matpel");
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();
        $this->load->view('matpel/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('matpel');
        }else{
            $this->Matpel_model->delete($id);
            redirect('matpel');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('matpel');
        $matpel = $this->Matpel_model;
        $data['matpel'] = $matpel->getByid($id);

        if(!$data['matpel']) redirect('matpel');

        $validasi = $this->form_validation;
        $validasi->set_rules($matpel->rules());

        if ($validasi->run()){
            $matpel->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();

        $this->load->view("matpel/ubah",$data);
    }
    function select_validate($param)
    {
        if($param=="0"){
            $this->form_validation->set_message('select_validate', 'Mohon untuk memilih {field}');
            return false;
        } else{
            return true;
        }
    }
    public function cetak($type=null)
    {
            $model = $this->Matpel_model;
            $data['matpels'] = $model->getAll();

            if(!isset($type)){
                redirect('matpel');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('matpel');
            }elseif($type=="pdf"){
                
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('matpel/cetak',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf();
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Daftar Mata Pelajaran.pdf ', 'D');
                
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:B1')
                    ->setCellValue('A2', 'Data Mata Pelajaran')
                    ->mergeCells('A2:B2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nama Mata Pelajaran');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["matpels"] as $matpel) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$matpel->matpel_nama);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Matpel '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Mata Pelajaran.xlsx"');
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