<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
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
        if (!isset($id)) redirect('siswa');
        
        if($this->Siswa_model->delete($id)){
            redirect('siswa');
        }
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('siswa');

        $siswa = $this->Siswa_model;
        $kelas =$this->Kelas_model;        
        $validasi = $this->form_validation;
        $validasi->set_rules($siswa->rules());

        if ($validasi->run()){
            $siswa->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        $data['siswa'] = $siswa->getByid($id);
        $data["title"] = "Ubah Data";
        $data["actor"] = "Siswa";
        $data["kelass"] = $kelas->getAll();

        
        $this->load->view('siswa/ubah',$data);
    }

    public function tambah()
    {
        $siswa = $this->Siswa_model;
        $kelas = $this->Kelas_model;

        $data["title"] = "Tambah Data";
        $data["actor"] = "Siswa";
        $data["kelass"] = $kelas->getAll();

        $this->form_validation->set_rules('siswa_nis','NIS','required|numeric');
        $this->form_validation->set_rules('siswa_nik','NIK','required|numeric');
        $this->form_validation->set_rules('siswa_nama','NAMA','required');


        if ($this->form_validation->run() == FALSE){
            
            $this->load->view('siswa/tambah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $siswa->simpan();
                //$uploadFoto = $this->upload_foto_siswa();
                //$this->Model_siswa->save($uploadFoto);
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('siswa');
        }
    }


}