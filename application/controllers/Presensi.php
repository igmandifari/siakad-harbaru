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
            $data["title"] = "Daftar Kelas";
            $data["actor"] ="Presensi Kehadiran";
            

            $this->load->view('tutor/presensi',$data);
        }
    }