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
        public function cetak($type=null)
        {
            $model = $this->Rekappresensi_model;
            $tahun = $this->session->userdata('tahunajaran_id');
            // warga belajar id
            $wb_id = $this->session->userdata('id');
            $data['jadwals'] = $model->getJadwal($wb_id,$tahun);
            $data['model']=$model;
            $data['wb_id']=$wb_id;

            if(!isset($type)){
                redirect('rekappresensi');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('rekappresensi');
            }elseif($type=="pdf"){
                
                
                // $this->load->view('tutor/presensi/cetak',$data);
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('dasbor/wargabelajar/cetak_rekappresensi',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Rekap Presensi '.$this->session->userdata('induk').' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($jadwal);
                var_dump($data['jadwals']);
            }
        }
    }