<?php
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("Jadwal_model");
        $this->load->model("Kelas_model");
        $this->load->model("Tutor_model");
        $this->load->model("Matpel_model");
    }
    public function index()
    {
        echo base_url();
    }

    public function tambah()
    {
       

        if(isset($_POST["submit"])){
            $this->Jadwal_model->simpan();
            redirect('jadwal');

        }else{
            $data["title"] = "Tambah Jadwal Mata Pelajaran";
            $data["actor"] = "Jadwal";
            $data["kelass"] = $this->Kelas_model->getAll();
            $data["matpels"] = $this->Matpel_model->getAll();
            $data["tutors"] = $this->Tutor_model->getAll();

            $this->load->view("jadwal/tambah",$data);
            
        }
    }
}
