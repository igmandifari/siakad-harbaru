<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
class Pimpinan extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model("Pimpinan_model");
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data["pimpinans"] = $this->Pimpinan_model->getAll();
        $data["title"] = "Data Pimpinan";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();
    
        $this->load->view('pimpinan/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('pimpinan');
        }
    //     }elseif(!$this->Pimpinan_model->delete($id)){
    //          redirect('pimpinan');
    // }
        else{
            $this->Pimpinan_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil');
          
            redirect('pimpinan');
        }
    }

    public function ubah($id=null)
    {
        if (!isset($id)) redirect('pimpinan');

        $pimpinan = $this->Pimpinan_model;
        $data['pimpinan'] = $pimpinan->getByid($id);

        if(!$data['pimpinan']) redirect('pimpinan');
        
        $validasi = $this->form_validation;

        $validasi->set_rules($pimpinan->rules_edit());
        if ($validasi->run()){
                $pimpinan->perbarui();
                $this->session->set_flashdata('success', 'Berhasil');
            
        }
        $data["title"] = "Ubah Data";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();
        
        $this->load->view('pimpinan/ubah',$data);
    }

    public function ubah_password(){
        $pimpinan = $this->Pimpinan_model;

        $this->form_validation->set_rules('pimpinan_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $pimpinan->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('pimpinan');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('pimpinan');
        } 
    }

    public function tambah()
    {
        $pimpinan = $this->Pimpinan_model;
    
        $validasi = $this->form_validation;
        $validasi->set_rules($pimpinan->rules());
        if ($validasi->run()){
            
            $pimpinan->simpan();
            $this->session->set_flashdata('success', 'Berhasil');

            redirect('pimpinan');
        }
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Pimpinan";
        $data["tahunajarans"] = $this->Pimpinan_model->getTahunAjaran();

        $this->load->view('pimpinan/tambah',$data);
    }
    public function username_check_blank($str)
    {

    $pattern = '/ /';
    $result = preg_match($pattern, $str);

    if ($result)
    {
        $this->form_validation->set_message('username_check_blank', 'Kolom {field} dilarang menggunakan spasi');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
    }
    public function cetak($type=null)
    {
        $model = $this->Pimpinan_model;
        $data['pimpinans'] = $model->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('pimpinan');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('pimpinan/cetak',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Pimpinan.pdf', 'D');
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:B1')
                    ->setCellValue('A2', 'Data Pimpinan')
                    ->mergeCells('A2:B2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nama Pimpinan');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["pimpinans"] as $pimpinan) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$pimpinan->pimpinan_nama);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Pimpinan '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Pimpinan.xlsx"');
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