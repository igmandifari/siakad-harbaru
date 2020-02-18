<?php
class Matpel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Matpel_model');
        $this->load->library('form_validation'); 
        $this->load->helper('security'); 
    }

    public function index()
    {
        $data["matpels"] = $this->Matpel_model->getAll();
        $data["title"] = "Data Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();

        $this->load->view('matpel/list',$data);
    }

    public function tambah()
    {
        $matpel = $this->Matpel_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($matpel->rules());

        if ($validasi->run()){
            $matpel->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            
            redirect("matpel");
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";
        $data["tutors"] = $matpel->getTutor();
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();
        $this->load->view('matpel/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('matpel');
        }else{
            $this->Matpel_model->delete($id);
            redirect('matpel');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('matpel');
        $matpel = $this->Matpel_model;
        $data['matpel'] = $matpel->getByid($id);

        if(!$data['matpel']) redirect('matpel');

        $validasi = $this->form_validation;
        $validasi->set_rules($matpel->rules());

        if ($validasi->run()){
            $matpel->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data["tutors"] = $matpel->getTutor();
        $data["tahunajarans"] = $this->Matpel_model->getTahunAjaran();

        $this->load->view("matpel/ubah",$data);
    }
    function select_validate($param)
    {
        if($param=="0"){
            $this->form_validation->set_message('select_validate', 'Mohon untuk memilih {field}');
            return false;
        } else{
            return true;
        }
    }
    public function cetak($type=null)
    {
            $model = $this->Matpel_model;

            if(!isset($type)){
                redirect('matpel');
            }elseif ($type != "xlsx" && $type !="pdf") {
                redirect('matpel');
            }elseif($type=="pdf"){
                
                $data['matpels'] = $model->getAll();
                // $this->load->view('jadwal/cetak',$data);
                $style = file_get_contents(base_url('assets/css/presensi.css'));
                $cetak = $this->load->view('matpel/cetak',$data,TRUE);
                $jadwal= new \Mpdf\Mpdf();
                $jadwal->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $jadwal->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $jadwal->Output('Daftar Mata Pelajaran.pdf ', 'D');
                
            }elseif($type=="xlsx"){
                $data['jadwals'] = $model->getJadwals($tahun);
                var_dump($data['jadwals']);
            }
        }

}