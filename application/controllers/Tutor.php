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

        $this->load->view('tutor/list',$data);
        
    }
    // public function hapus($id){
    //     $this->load->model('Tutor_model');
    //     $run = $this->Tutor_model->delete_entry($id);
    //     if($run)
    //     {
    //         echo "<script>alert('berhasil menghapus data');</script>";
    //     }else
    //     {
    //         echo "<script>alert('gagal menghapus data')</script>";
    //     }
    // }
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
        $this->load->view("tutor/ubah",$data);
        }
    }
    public function tambah(){
        $tutor = $this->Tutor_model;
        //$validasi = $this->form_validation;
        //$validasi = set_rules('field_name', 'Field Label', 'tutor_nip|NIP|required');
        $submit = $this->input->post("submit");
        if($submit) {
            $tutor->simpan();
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["title"] = "Tambah Data";
        $data["actor"] = "Tutor";

        $this->load->view('tutor/tambah',$data);
    }
    
}