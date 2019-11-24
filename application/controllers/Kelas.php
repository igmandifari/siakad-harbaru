<?php
class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Kelas_model");
    }

    public function index()
    {
        $data["kelass"] = $this->Kelas_model->getAll();
        $data["title"] = "Data Kelas";
        $data["case"] = "Kelas";
    
        $this->load->view('kelas/list',$data);
    }

    public function tambah()
    {
        if(isset($_POST["submit"])){
            $this->Kelas_model->simpan();
            redirect('kelas');
        }

        $data["title"] = "Tambah Data";
        $data["case"] = "Kelas";

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
        $kelas = $this->Kelas_model;

        if(isset($_POST["submit"])){
            $kelas->perbarui();
            redirect('kelas');
        }
        else{
            $data["kelas"] = $kelas->getById($id);
            $data["title"] = "Ubah Data";
            $data["case"] = "Kelas";
            
            $this->load->view('kelas/ubah',$data);
        }
        
    }

}