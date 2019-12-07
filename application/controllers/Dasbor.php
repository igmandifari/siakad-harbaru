<?php
class Dasbor extends CI_Controller
{
    public function index(){
        $data["title"] = "Dasbor";
        $this->load->view('head',$data);
        $this->load->view('foot');
    }
}