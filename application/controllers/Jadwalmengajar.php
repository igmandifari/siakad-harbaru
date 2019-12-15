<?php
class Jadwalmengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 3) redirect("dasbor");
    }

    public function index()
    {
        echo $this->session->userdata('nama');
    }
}