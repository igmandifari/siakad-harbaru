<?php

Class Masukan extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 1) redirect("dasbor");
        
		$this->load->model('Masukan_model');
		$this->load->helper("security");
	}
    public function index()
    {
        $data['title'] = 'Kirim Masukan';
        $data['tahunajarans']=$this->Masukan_model->getTahunAjaran();
        $this->load->view('dasbor/wargabelajar/masukan',$data);
    }
    public function kirim_masukan()
    {
    	if($this->input->method()=="post"){
    		$masukan = $this->Masukan_model;
    		$insert = $masukan->insert(array(
    			'masukan_id'		=> uniqid(),
    			'wargabelajar_id'	=> $this->session->userdata('id'),
    			'tahunajaran_id'	=> $this->session->userdata('tahunajaran_id'),
    			'masukan'			=> $this->security->xss_clean($this->input->post('masukan')),
    			'created_at'		=> date('Y-m-d H:i:s')
    		));

    	}
    }
    public function history_masukan()
    {
    	$masukan = $this->Masukan_model;
    	$id = $this->session->userdata('id');
    	$tahun = $this->session->userdata('tahunajaran_id');
    	$data['masukans'] = $masukan->get($id,$tahun);

    	echo json_encode($data['masukans']);	
    }
}