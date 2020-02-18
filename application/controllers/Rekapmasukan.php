<?php
class Rekapmasukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Masukan_model');
    }
    public function index()
    {
        $masukan = $this->Masukan_model;
        $data["tahunajarans"]=$masukan->getTahunAjaran();
        $data['masukans'] = $masukan->getAll();
        $data['title'] = "Data Masukan";
        $this->load->view('masukan/content',$data);


    }
    public function hapus($id=null)
    {
        $masukan = $this->Masukan_model;
        if(isset($id)){
            $masukan->hapus($id);
            redirect('rekapmasukan');
        }
    }
    public function cetak($type=null)
    {
        $model = $this->Masukan_model;
        $data['masukans'] = $model->getAll();
        if ($type != "xlsx" && $type !="pdf") {
                redirect('rekapmasukan');
            }elseif($type=="pdf"){
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('masukan/cetak_rekap',$data,TRUE);
                $pdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Legal-L']);
                $pdf->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $pdf->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $pdf->Output('Data Masukan.pdf', 'D');
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($tahun);
                var_dump($data['jadwals']);
            }
    }

}