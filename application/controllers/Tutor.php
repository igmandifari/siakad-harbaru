<?php
class Tutor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MASUK') != TRUE){
            $url=base_url();
            redirect($url);
        }
        $this->load->model("Tutor_model");
        $this->load->library('form_validation');
        $this->load->helper('security');
    }

    public function index()
    {
        $data["tutors"] = $this->Tutor_model->getAll();
        $data["title"] = "Data Tutor";
        $data["actor"] = "Tutor";
    
        $this->load->view('tutor/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('siswa');
        }
        else{
            $this->Tutor_model->delete($id);
            redirect('tutor');
        }
    }

    public function ubah($id=null)
    {
        if (!isset($id)) redirect('tutor');

        $tutor = $this->Tutor_model;
        $data['tutor'] = $tutor->getByid($id);
        
        $validasi = $this->form_validation;
        $validasi->set_rules($tutor->rules());
        if ($validasi->run()){
                $tutor->perbarui();
                $this->session->set_flashdata('success', 'Berhasil');
            
        }
        $data["title"] = "Ubah Data";
        $data["actor"] = "Tutor";

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
        }
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Tutor";

        $this->load->view('tutor/tambah',$data);
    }
    
}