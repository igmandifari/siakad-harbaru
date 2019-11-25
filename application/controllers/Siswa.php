<?php

Class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MASUK') != TRUE){
            $url=base_url();
            redirect($url);
        }
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');        
        $this->load->library('upload');
    }
    
    public function index()
    {
        $data["title"] = "Data Siswa";
   	    $data["actor"] = "Siswa";
        $data["siswas"] = $this->Siswa_model->getAll();

        $this->load->view('siswa/list',$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('siswa');
        }
        else{
            $this->Siswa_model->delete($id);
            redirect('siswa');
        }
    }

    public function ubah($id=null)
    {
        $siswa= $this->Siswa_model;
        
        if(isset($_POST["submit"])){
            $siswa->perbarui();
            redirect('siswa');
        }
        else{
            $data["siswa"] = $siswa->getById($id);
            $data["title"] = "Ubah Data";
            $data["case"] = "siswa";
            $this->load->view("siswa/ubah",$data);
        }
    }

    public function tambah()
    {
        $siswa = $this->Siswa_model;
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Siswa";

        $this->form_validation->set_rules('siswa_nis','NIS','required|numeric');
        $this->form_validation->set_rules('siswa_nisn','NISN','required|numeric');
        $this->form_validation->set_rules('siswa_nama','NAMA','required');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('siswa/tambah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $siswa->simpan();
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('siswa');
        }
    }

}