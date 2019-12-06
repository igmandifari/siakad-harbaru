<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Wargabelajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Wargabelajar_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
        $this->load->helper('security');

    }
    
    public function index()
    {
        $data["title"] = "Data Warga Belajar";
   	    $data["actor"] = "Warga Belajar";
        $data["wargabelajars"] = $this->Wargabelajar_model->getAll();

        $this->load->view('wargabelajar/list',$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) redirect('wargabelajar');
        
        if($this->Wargabelajar_model->delete($id)){
            redirect('wargabelajar');
        }
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('wargabelajar');

        $wargabelajar = $this->Wargabelajar_model;
        $kelas =$this->Kelas_model;        
        $validasi = $this->form_validation;
        $validasi->set_rules($wargabelajar->rules());

        if ($validasi->run()){
            $wargabelajar->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        $data['wargabelajar'] = $wargabelajar->getByid($id);
        $data["title"] = "Ubah Data";
        $data["actor"] = "Warga Belajar";
        $data["kelass"] = $kelas->getAll();

        if(!$data['wargabelajar']) redirect('wargabelajar');
        
        $this->load->view('wargabelajar/ubah',$data);
    }

    public function tambah()
    {
        $wargabelajar = $this->Wargabelajar_model;
        $kelas = $this->Kelas_model;

        $validasi =  $this->form_validation;
        $validasi->set_rules($wargabelajar->rules());

        if ($validasi->run()){
            $wargabelajar->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
        } 
        $data["title"] = "Tambah Data";
        $data["actor"] = "Warga Belajar";
        $data["kelass"] = $kelas->getAll();

        $this->load->view('wargabelajar/tambah',$data);
    }


}