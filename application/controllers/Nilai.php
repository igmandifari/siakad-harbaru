<?php
    Class Nilai extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);
            if($this->session->userdata('level') != 3) redirect("dasbor");
            $this->load->model('Nilai_model');
        }
        public function index(){
            $nilai = $this->Nilai_model;

            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Nilai";
            $data["SemuaKelas"] = $nilai->getKelas();
            
            $this->load->view('tutor/nilai/list',$data,FALSE);
        }
        public function matpel($id=null)
        {
            if(!isset($id)) redirect('nilai');

            
        }

    }