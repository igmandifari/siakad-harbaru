<?php
class Dasbor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        $this->load->model('Dasbor_model');   
    }
    public function index(){
        $dasbor = $this->Dasbor_model;
        $data["title"] = "Dasbor";
        $data["tahunajarans"] = $dasbor->getTahunAjaran();


        if($this->session->userdata('level') == 0){
            $data["countWargaBelajar"] = $dasbor->countWargaBelajar();
            $data["countAdmin"] = $dasbor->countAdmin();
            $data["countTutor"] = $dasbor->countTutor();
            $data["countPimpinan"] = $dasbor->countPimpinan();
            $this->load->view('dasbor/dasbor_admin',$data);
        }
        else if($this->session->userdata('level') == 1){
            $this->load->view('dasbor/wargabelajar/dasbor_wargabelajar',$data);
        }else if($this->session->userdata('level') == 2)
        {
            $this->load->view('dasbor/pimpinan/dasbor',$data);
        }else if($this->session->userdata('level') == 3)
        {
            $this->load->view('dasbor/dasbor_tutor',$data);
        }

    }
    public function setTahunajaran()
    {
        if($this->input->method()=="post"){
            $thnid = $this->input->post('tahunajaran_id');
            $this->session->set_userdata('tahunajaran_id',$thnid);
        }
    }
}