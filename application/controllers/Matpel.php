<?php
class Matpel extends CI_Controller
{
    

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Matpel_model");
        
    }

    public function index()
    {
        $data["matpels"] = $this->Matpel_model->getAll();
        $data["title"] = "Data Mata Pelajaran";
        $data["case"] = "Mata Pelajaran";

        $this->load->view('matpel/list',$data);
    }

    public function tambah()
    {
        if(isset($_POST["submit"])){
            $this->Matpel_model->simpan();
            redirect('matpel');
        }

        $data["title"] = "Tambah Data";
        $data["case"] = "Mata Pelajaran";

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
        $matpel = $this->Matpel_model;

        if(isset($_POST["submit"])){
            $matpel->perbarui();
            redirect('matpel');
        }
        else{
            $data["matpel"] = $matpel->getById($id);
            $data["title"] = "Ubah Data";
            $data["case"] = "Mata Pelajaran";
            
            $this->load->view('matpel/ubah',$data);
        }
        
    }

}