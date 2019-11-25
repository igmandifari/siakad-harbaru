<?php
class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MASUK') != TRUE){
            $url=base_url();
            redirect($url);
        }
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');        
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
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Kelas";

        $this->form_validation->set_rules('kelas_nama','NAMA/ID','required');


        if ($this->form_validation->run() == FALSE){
            $this->load->view('kelas/tambah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $kelas->simpan();
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('kelas');
        }
    
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
        
        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";

        $data['kelas'] = $kelas->getByid($id);
        $this->form_validation->set_rules('kelas_nama','NAMA/ID','required');


        if ($this->form_validation->run() == FALSE){
            $this->load->view('kelas/ubah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $kelas->perbarui();
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('kelas');
        }
        
        
    }

}