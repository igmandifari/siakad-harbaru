<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pengaturan extends CI_Controller
{
	public $level;
	public $id;
	public $name;
	public $photo;

	public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);

            $this->level = $this->session->userdata('level');
            $this->id = $this->session->userdata('id');
            $this->name = $this->session->userdata('nama');
            $this->photo = $this->session->userdata('foto');

            $this->load->model("Pengaturan_model");
            $this->load->library("form_validation");
            $this->load->helper('security');
        }

    public function index()
    {
    	$model = $this->Pengaturan_model;
    	$data['title'] = "Pengaturan";
    	$data['tahunajarans'] = $model->getTahunAjaran();
        if($this->level==0){
        	$data['admin'] = $model->getAdmin($this->id);
        	$this->load->view("pengaturan/admin",$data);
        }
        if($this->level==1){
        	$this->load->view("pengaturan/wargabelajar");
        }
        if($this->level==3){
        	$this->load->view("pengaturan/tutor");
        }
    }
    public function update()
    {
    	$validation = $this->form_validation;
    	$model = $this->Pengaturan_model;

    	$validation->set_rules('admin_nama','Nama','required|trim|xss_clean');
        $validation->set_rules('admin_username','Username','callback_username_check_blank|xss_clean|trim');

        if($validation->run()){
        	$model->updateAdmin($this->id);
        	$this->session->set_flashdata('success', 'Berhasil mengubah data');
        }else{
        	redirect('pengaturan');
        }
    }
    public function username_check_blank($str)
    {

    $pattern = '/ /';
    $result = preg_match($pattern, $str);

    if ($result)
    {
        $this->form_validation->set_message('username_check_blank', 'Kolom {field} dilarang menggunakan spasi');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
    }
}