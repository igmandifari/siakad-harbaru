<?php
    class Presensi extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);
            if($this->session->userdata('level') != 3) redirect("dasbor");

            $this->load->model('Presensi_model');
        }

        public function index()
        {
            // if(!isset($kelas)){
            $presensi = $this->Presensi_model;

            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Presensi Kehadiran";
            $data["SemuaKelas"] = $presensi->getKelas();
            
            $this->load->view('tutor/presensi',$data);
        }
        public function kelas($id=null)
        {
            if(!isset($id)) redirect('presensi');

            $presensi = $this->Presensi_model;

            $data[kelas] = $presensi->getPertemuan($id);

            
        }
        
    }