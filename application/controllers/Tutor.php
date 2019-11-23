<?php
class Tutor extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Tutor_model");
        $this->load->library('upload');
    }

    public $error ="";
    public $status ="";

    public function index()
    {
        $data["tutors"] = $this->Tutor_model->getAll();
        $data["title"] = "Data Tutor";
        $data["actor"] = "Tutor";
    
        $this->load->view('tutor/list',$data);    
    }

    public function hapus($id=null)
    {
        if (!isset($id)){
            redirect('siswa');
        }
        else{
            $this->Tutor_model->delete($id);
            redirect('tutor');
        }
    }

    public function ubah($id=null)
    {
        $tutor= $this->Tutor_model;
        
        if(isset($_POST["submit"])){
            $tutor->perbarui();
            redirect('tutor');
        }
        else{
            $data["tutor"] = $tutor->getById($id);
            $data["title"] = "Ubah Data";
            $data["case"] = "Tutor";
            $this->load->view("tutor/ubah",$data);
        }
    }

    public function tambah(){
        $tutor = $this->Tutor_model;
        //$validasi = $this->form_validation;
        //$validasi = set_rules('field_name', 'Field Label', 'tutor_nip|NIP|required');
        //$submit = $this->input->post("submit");
        // $config['upload_path']      = './gambar/';
        // $config['allowed_types']    = 'jpg|png|jpeg';
        // $config['max_size']         = '200';
        //$upload_img = $this->upload($config)->do_upload('tutor_foto');
        if(isset($_POST["submit"])) {
            //$error = $this->upload->display_errors();
            //$status = $this->upload->data();
            $tutor->simpan();
            redirect('tutor');
            //$this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["title"] = "Tambah Data";
        $data["case"] = "Tutor";

        $this->load->view('tutor/tambah',$data);
    }
    
}