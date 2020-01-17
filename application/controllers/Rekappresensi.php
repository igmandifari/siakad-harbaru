<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Rekappresensi extends CI_Controller
    {
    	public function __construct()
    	{
    		parent::__construct();
        	$url=base_url();
        
        	if($this->session->userdata('MASUK') != TRUE)redirect($url);
	        if($this->session->userdata('level') != 1) redirect("dasbor");

	        $this->load->model('Rekappresensi_model');
        }
        public function index()
        {

        }
    }