<?php
class Jadwalmengajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 3) redirect("dasbor");

        $this->load->model('Jadwalmengajar_model');
    }

    public function index()
    {
        $jadwalmengajar = $this->Jadwalmengajar_model;
        
        $data["all_jadwal_mengajar"] = $jadwalmengajar->getJadwalByIdTutor();
        $data["title"] = "Daftar Jadwal Mengajar";
        $data["actor"] ="Jadwal Mengajar";
        $data["tahunajarans"] = $jadwalmengajar->getTahunAjaran();

        $this->load->view('tutor/jadwalmengajar',$data);
    }
    public function cetak($type=null)
    {
        $model = $this->Jadwalmengajar_model;
        $tahun = $this->session->userdata('tahunajaran_id');

        if(!isset($type)){
            redirect('jadwalmengajar');
        }elseif ($type != "xlsx" && $type !="pdf") {
            redirect('jadwalmengajar');
        }elseif($type=="pdf"){
            
            $data['jadwals'] = $model->getJadwal($tahun);
            // $this->load->view('jadwal/cetak',$data);
            $style = file_get_contents(base_url('assets/css/report.css'));
            $cetak = $this->load->view('jadwal/cetak',$data,TRUE);
            $jadwal= new \Mpdf\Mpdf();
            $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
            $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
            $jadwal->Output('Jadwal Pelajaran Tahun Ajaran '.$this->session->userdata('tahunajaran_nama').'.pdf', 'D');
            
        }elseif($type=="xlsx"){
            $data['jadwals'] = $model->getJadwal($tahun);
            var_dump($data['jadwals']);
        }
    }
}