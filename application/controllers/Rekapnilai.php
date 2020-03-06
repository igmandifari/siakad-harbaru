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
	        $logs = $this->Rekapnilai_model->logs();
        }
        public function index()
        {
            $model = $this->Rekapnilai_model;

            $data['jadwals'] = $model->getJadwal($this->wb_id,$this->ta_id);

            // var_dump($jadwals);
            $data['title'] = "Daftar Nilai";
            $data["tahunajarans"]=$model->getTahunAjaran();
            $data['model'] = $model;

            $tahunajaran = $model->get_tahun_ajaran($this->ta_id);
            
            if($tahunajaran['open_nilai']==1){
                $this->load->view('dasbor/wargabelajar/nilai',$data,FALSE);
            }else{
                $this->load->view('dasbor/wargabelajar/nilai_0',$data,FALSE);
            }
        }
        public function cetak($type=null)
        {
            $model = $this->Rekapnilai_model;
            $tahun = $this->session->userdata('tahunajaran_id');
            // warga belajar id
            $wb_id = $this->session->userdata('id');
            $data['jadwals'] = $model->getJadwal($wb_id,$tahun);
            $data['model']=$model;
            $data['wb_id']=$wb_id;

            if(!isset($type)){
                redirect('rekapnilai');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('rekapnilai');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('dasbor/wargabelajar/cetak_rekapnilai',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Rekap Nilai '.$this->session->userdata('induk').' Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
                
            }
        }

    }