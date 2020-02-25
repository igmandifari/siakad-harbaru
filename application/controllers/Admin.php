<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    
    class Admin extends CI_Controller
    {

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {

        $data["title"] = "Data Admin";
        $data["actor"] = "admin";
        $data["admins"] = $this->Admin_model->getAll();
        $data["tahunajarans"]=$this->Admin_model->getTahunAjaran();
    
        $this->load->view('admin/list',$data);
    }

    public function tambah()
    {
        $admin = $this->Admin_model;    
        $validasi = $this->form_validation;
        $validasi->set_rules($admin->rules());

        if ($validasi->run()){
            $admin->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('admin');
            
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "admin";
        $data["tahunajarans"]=$this->Admin_model->getTahunAjaran();
        $this->load->view('admin/tambah',$data);
    
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('admin');
        }else{
            $this->Admin_model->delete($id);
            redirect('admin');
        }
    }
    public function ubah_password($asal=null){
        $admin = $this->Admin_model;
        $validation= $this->form_validation;

        $validation->set_rules('admin_password','Password','required|min_length[7]');

        if ($validation->run()){
            if($asal == "pengaturan"){
                $admin->perbarui_password($this->session->userdata('id'));
            }else{
                $admin->perbarui_password();
            }
            $this->session->set_flashdata('success', 'Berhasil');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
        }
        if($asal == "pengaturan"){
            redirect('pengaturan');
        }else{
            redirect('admin');
        } 
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('admin');

        $admin = $this->Admin_model;

        $this->form_validation->set_rules('admin_nama','Nama','required|trim|xss_clean');        
        $this->form_validation->set_rules('admin_username','Username','required|trim|callback_username_check_blank|xss_clean|min_length[7]');

        if ($this->form_validation->run()){
           $admin->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        } 

        $data["title"] = "Ubah Data";
        $data["actor"] = "admin";
        $data["admin"] = $admin->getByid($id);
        $data["tahunajarans"]=$this->Admin_model->getTahunAjaran();
 
        if(!$data['admin']) redirect('admin');

        $this->load->view('admin/ubah',$data);        
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
            $model = $this->Admin_model;
            $data['admins'] = $model->getAll();

            if(!isset($type)){
                redirect('admin');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('admin');
            }elseif($type=="pdf"){
                // $this->load->view('jadwal/cetak',$data);
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('admin/cetak',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf();
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Daftar Admin.pdf ', 'D');
                
            }elseif($type=="xlsx"){
                $spreadsheet = new Spreadsheet();
                $spreadsheet->getActiveSheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'PKBM Harapan Baru')
                    ->mergeCells('A1:D1')
                    ->setCellValue('A2', 'Data Admin')
                    ->mergeCells('A2:D2')
                    ->setCellValue('A5','NO')
                    ->setCellValue('B5','Nama Admin')
                    ->setCellValue('C5','Username')
                    ->setCellValue('D5','Password');

                // Set Width
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
                

                // Parsing data from database
                $row = 6;
                $n = 1;
                foreach ($data["admins"] as $admin) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A'.$row,$n)
                        ->setCellValue('B'.$row,$admin->admin_nama)
                        ->setCellValue('C'.$row,$admin->admin_username)
                        ->setCellValue('D'.$row,$admin->admin_password);
                    $row++;
                    $n++;
                }
              
                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Data Admin '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Set landscape
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $spreadsheet->getActiveSheet()->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LEGAL);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Data Admin.xlsx"');
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