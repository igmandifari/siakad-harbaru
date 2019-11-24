<?php

Class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
<<<<<<< HEAD
        $this->form_validation->set_rules('siswa_nama','NAMA','required');
        $this->form_validation->set_rules('siswa_jenis_kelamin','Jenis Kelamin','required');
        $this->form_validation->set_rules('siswa_agama','Agama','required');
=======
        $this->form_validation->set_rules('siswa_nisn','NISN','required|numeric');
        $this->form_validation->set_rules('siswa_nama','NAMA','required');
>>>>>>> 7d1a9c172eef389cf4f054448f50f53dc0cc1bbb

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