<?php
class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");

        $this->load->model("Jadwal_model");
        $this->load->model("Kelas_model");
        $this->load->model("Tutor_model");
        $this->load->model("Matpel_model");
    }
    public function index()
    {
        $data["jadwals"] = $this->Jadwal_model->getAll();
        $data["title"] = "Jadwal Mata Pelajaran";
        $data["actor"] = "Mata Pelajaran";

        $this->load->view('jadwal/list',$data);
    }

    public function ubah($id=null)
    {
        
        if(isset($_POST["submit"])){
            $this->Jadwal_model->perbarui();
            redirect('jadwal');
        }else{

            $data["title"] = "Ubah Jadwal Mata Pelajaran";
            $data["actor"] = "Jadwal";
            $data["kelass"] = $this->Kelas_model->getAll();
            $data["matpels"] = $this->Matpel_model->getAll();
            $data["tutors"] = $this->Tutor_model->getAll();
            $data["jadwal"] = $this->Jadwal_model->getById($id);

            if(!$data['jadwal']) redirect('jadwal');

            $this->load->view("jadwal/ubah",$data);
        }

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