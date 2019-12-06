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
        }

        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";

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

        $this->load->view("matpel/ubah",$data);
    }

}