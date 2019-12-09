<?php
class Tahunajaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Tahunajaran_model');
        $this->load->library('form_validation'); 
        $this->load->helper('security'); 
    }

    public function index()
    {
        $data["tahunajarans"] = $this->Tahunajaran_model->getAll();
        $data["title"] = "Data Tahun Ajaran";
        $data["actor"] = "Tahun Ajaran";

        $this->load->view('tahunajaran/list',$data);
    }

    public function tambah()
    {
        $tahunajaran = $this->Tahunajaran_model;

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $tahunajaran->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";

        $this->load->view('tahunajaran/tambah',$data);
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('tahunajaran');
        }else{
            $this->Tahunajaran_model->delete($id);
            redirect('tahunajaran');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('tahunajaran');
        $tahunajaran = $this->Tahunajaran_model;
        $data['tahunajaran'] = $tahunajaran->getByid($id);

        if(!$data['tahunajaran']) redirect('tahunajaran');

        $validasi = $this->form_validation;
        $validasi->set_rules($tahunajaran->rules());

        if ($validasi->run()){
            $tahunajaran->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        }

        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";

        $this->load->view("tahunajaran/ubah",$data);
    }

}