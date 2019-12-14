<?php
class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
        $this->load->helper('security');
    }

    public function index()
    {

        $data["title"] = "Data Kelas";
        $data["actor"] = "Kelas";
        $data["kelass"] = $this->Kelas_model->getAll();
    
        $this->load->view('kelas/list',$data);
    }
    public function tambahWargaBelajar(){
        $data["title"] = "Masukan Warga Belajar";
        $data["actor"] = "Kelas";
    }
    public function tambah()
    {
        $kelas = $this->Kelas_model;
        
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect("kelas"); 
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Kelas";

        $this->load->view('kelas/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('kelas');
        }else{
            $this->Kelas_model->delete($id);
            redirect('kelas');
        }
    }

    public function ubah($id=null)
    {
        if (!isset($id)) redirect('kelas');

        $kelas = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas->rules());

        if ($validasi->run()){
            $kelas->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }
        
        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";
        $data['kelas'] = $kelas->getByid($id);

        if(!$data['kelas']) redirect('kelas');

        $this->load->view('kelas/ubah',$data);

    }

    public function rombel_tambah($id=null)
    {
        $kelas_model = $this->Kelas_model;
        $validasi = $this->form_validation;
        $validasi->set_rules($kelas_model->rules_rombel());

        if($validasi->run()){
            $kelas_model->rombel_save();
            $this->session->set_flashdata('success', 'Berhasil dimasukan');
        }

        $data["title"] = "Tambah Rombel";
        $data["actor"] = "Rombongan Belajar";
        $data["kelasAll"]= $kelas_model->getAll();
        $data["tahunAjaranAll"]= $kelas_model->getTahunAjaran();
        $data["wargabelajarAll"]= $kelas_model->getWargaBelajar();

        $this->load->view("kelas/rombel/tambah",$data);
        
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
}