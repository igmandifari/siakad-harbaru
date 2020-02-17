<?php
class Jadwalmengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 3) redirect("dasbor");

        $this->load->model('Jadwalmengajar_model');
    }

    public function index()
    {
        $jadwalmengajar = $this->Jadwalmengajar_model;
        
        $data["all_jadwal_mengajar"] = $jadwalmengajar->getJadwalByIdTutor();
        $data["title"] = "Daftar Jadwal Mengajar";
        $data["actor"] ="Jadwal Mengajar";
        $data["tahunajarans"] = $jadwalmengajar->getTahunAjaran();

        $this->load->view('tutor/jadwalmengajar',$data);
    }
    public function cetak($type=null)
    {
        if(!isset($type)){
            redirect('jadwalmengajar');
        }elseif ($type != "xlsx" && $type !="pdf") {
            redirect('jadwalmengajar');
        }else{
            echo $type;
        }
    }
}