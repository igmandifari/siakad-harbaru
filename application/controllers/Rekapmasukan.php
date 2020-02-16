<?php
class Rekapmasukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Masukan_model');
    }
    public function index()
    {
        $masukan = $this->Masukan_model;
        $data["tahunajarans"]=$masukan->getTahunAjaran();
        $data['masukans'] = $masukan->getAll();
        $data['title'] = "Data Masukan";
        $this->load->view('masukan/content',$data);


    }
    public function hapus($id=null)
    {
        $masukan = $this->Masukan_model;
        if(isset($id)){
            $masukan->hapus($id);
            redirect('rekapmasukan');
        }
    }

}