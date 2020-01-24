<?php
class Tutor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model("Tutor_model");
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data["tutors"] = $this->Tutor_model->getAll();
        $data["title"] = "Data Tutor";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();
        $this->load->view('tutor/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('siswa');
        }
        else{
            try{
            $this->Tutor_model->delete($id);
            $this->session->set_flashdata('success', 'Berhasil');
        }catch( Exception $e ) {
            redirect('dasbor');
        }

            
            redirect('tutor');
        }
    }
    public function ubah_password(){
        $tutor = $this->Tutor_model;

        $this->form_validation->set_rules('tutor_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $tutor->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('tutor');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('tutor');
        } 
    }
    public function ubah($id=null)
    {
        if (!isset($id)) redirect('tutor');

        $tutor = $this->Tutor_model;
        $data['tutor'] = $tutor->getByid($id);

        if(!$data['tutor']) redirect('tutor');
        
        $validasi = $this->form_validation;
        $validasi->set_rules($tutor->rules());
        if ($validasi->run()){
                $tutor->perbarui();
                $this->session->set_flashdata('success', 'Berhasil');
            
        }else{
            $this->session->set_flashdata('failed', 'Gagal');
        }
        $data["title"] = "Ubah Data";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();
        
        $this->load->view('tutor/ubah',$data);
    }

    public function tambah()
    {
        $tutor = $this->Tutor_model;
    
        $validasi = $this->form_validation;
        $validasi->set_rules($tutor->rules());
        if ($validasi->run()){
            
            $tutor->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('tutor');
        }
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Tutor";
        $data["tahunajarans"] = $this->Tutor_model->getTahunAjaran();

        $this->load->view('tutor/tambah',$data);
    }
    public function cetak()
    {
        $tutor = $this->Tutor_model;
        $data['tutors'] = $tutor->getAll();

        $cetak = $this->load->view('tutor/cetak',$data,TRUE);
        $mpdf= new \Mpdf\Mpdf();
        $mpdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output();
    }
    
}