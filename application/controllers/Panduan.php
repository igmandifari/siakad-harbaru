<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
 
    Class Panduan extends CI_Controller{

    	public $level;

    	public function __construct()
        {
            parent::__construct();
            $url=base_url();
            if($this->session->userdata('MASUK') != TRUE)redirect($url);

            $this->level = $this->session->userdata('level');
            $this->load->model('Masukan_model');
            $logs = $this->Masukan_model->logs();
        }

    	public function index()
    	{
    		if($this->level==0){
	        	$this->load->view("panduan/admin");
	        }elseif($this->level==1){
	        	$this->load->view("panduan/wargabelajar");
	        }elseif($this->level==2){
	            $this->load->view("panduan/pimpinan");
	        }elseif($this->level==3){
	        	$this->load->view("panduan/tutor");
	        }
    	}

    }