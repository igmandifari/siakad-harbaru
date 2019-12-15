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
}