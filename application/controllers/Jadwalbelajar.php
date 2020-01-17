<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Jadwalbelajar extends CI_Controller
    {
    	public function __construct()
    	{
    		parent::__construct();
        	$url=base_url();
        
        	if($this->session->userdata('MASUK') != TRUE)redirect($url);
	        if($this->session->userdata('level') != 1) redirect("dasbor");

	        $this->load->model('Jadwalbelajar_model');
        }
        public function index()
        {
        	$tahun = $this->session->userdata('tahunajaran_id');
        	$id =  $this->session->userdata('id');
        	$jadwal = $this->Jadwalbelajar_model;
        	
        	$data['jadwals'] = $jadwal->getJadwal($id,$tahun);
        	$data['title'] = "Jadwal Pelajaran";
          	$this->load->view('dasbor/wargabelajar/jadwal',$data);
        }

    }