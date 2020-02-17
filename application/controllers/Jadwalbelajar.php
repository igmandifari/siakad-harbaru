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
        	$tahun= $this->session->userdata('tahunajaran_id');
        	// $data["id"] =  $this->session->userdata('id');
        	$jadwal = $this->Jadwalbelajar_model;
            $data["tahunajarans"] = $jadwal->getTahunAjaran();
            $data["haris"]=$jadwal->getHari($tahun);
        	
        	$data['jadwal'] =  $this->Jadwalbelajar_model;
        	$data['title'] = "Jadwal Pelajaran";
          	$this->load->view('dasbor/wargabelajar/jadwal',$data);

        }
        public function cetak($type=null)
        {
            $model = $this->Jadwalbelajar_model;
            $tahun = $this->session->userdata('tahunajaran_id');

            if(!isset($type)){
                redirect('jadwalbelajar');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('jadwalbelajar');
            }elseif($type=="pdf"){
                
                $data['jadwals'] = $model->getJadwals($tahun);
                // $this->load->view('jadwal/cetak',$data);
                $style = file_get_contents(base_url('assets/css/report.css'));
                $cetak = $this->load->view('jadwal/cetak',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf();
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Jadwal Pelajaran Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($tahun);
                var_dump($data['jadwals']);
            }
        }

    }