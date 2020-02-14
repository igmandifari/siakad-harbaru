<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Rekapnilai extends CI_Controller
    {
        // warga belajar
        public $wb_id;
        // tahun ajaran
        public $ta_id;

    	public function __construct()
    	{
    		parent::__construct();
        	$url=base_url();
        
        	if($this->session->userdata('MASUK') != TRUE)redirect($url);
	        if($this->session->userdata('level') != 1) redirect("dasbor");

            $this->load->model("Rekapnilai_model");

            $this->wb_id = $this->session->userdata('id');
            $this->ta_id = $this->session->userdata('tahunajaran_id');
	        
        }
        public function index()
        {
            $model = $this->Rekapnilai_model;

            $data['jadwals'] = $model->getJadwal($this->wb_id,$this->ta_id);

            // var_dump($jadwals);
            $data['title'] = "Daftar Nilai";
            $data["tahunajarans"]=$model->getTahunAjaran();
            $data['model'] = $model;
            $this->load->view('dasbor/wargabelajar/nilai',$data,FALSE);
        }

    }