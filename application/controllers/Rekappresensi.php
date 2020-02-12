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
            $model = $this->Rekappresensi_model;
            // tahun ajaran id
            $tahun = $this->session->userdata('tahunajaran_id');
            $data["tahunajarans"] = $model->getTahunAjaran();
            // warga belajar id
            $wb_id = $this->session->userdata('id');
            $data['jadwals'] = $model->getJadwal($wb_id,$tahun);
            $data['model']=$model;
            $data['title']='Rekap Presensi';
            $data['wb_id']=$wb_id;

            $this->load->view('dasbor/wargabelajar/presensi',$data,FALSE);
        }
    }