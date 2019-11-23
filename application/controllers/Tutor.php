<?php
class Tutor extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Tutor_model");
    }
    public function index(){
        $data["tutors"] = $this->Tutor_model->getAll();
        $data["title"] = "Data Tutor";
        $data["actor"] = "Tutor";
         //$this->load->view('tutor/coba');
        $this->load->view('tutor/list',$data);
        
    }
    public function hapus($id=null){
        if (!isset($id)) redirect('siswa');
        
        if ($this->Tutor_model->delete($id)) {
            redirect('tutor');
        }
    }
    public function ubah($id=null)
    {
        $tutor= $this->Tutor_model;
//        if(!isset($id)) redirect('siswa');
        if(isset($_POST["submit"])){
            $tutor->perbarui();
            redirect('tutor');
        }
        else{
            $data["tutor"] = $tutor->getById($id);
            $data["title"] = "Ubah Data";
            $data["actor"] = "Tutor";
            $this->load->view("tutor/ubah",$data);
        }
    }
    public function tambah(){
        $tutor = $this->Tutor_model;
        //$validasi = $this->form_validation;
        //$validasi = set_rules('field_name', 'Field Label', 'tutor_nip|NIP|required');
        //$submit = $this->input->post("submit");
        if(isset($_POST["submit"])) {
            
            $tutor->simpan();
            redirect('tutor');
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["title"] = "Tambah Data";
        $data["actor"] = "Tutor";

        $this->load->view('tutor/tambah',$data);
    }
    
}