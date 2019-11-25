<?php
class Matpel extends CI_Controller
{
    

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MASUK') != TRUE){
            $url=base_url();
            redirect($url);
        }
        $this->load->model('Matpel_model');
        $this->load->library('form_validation'); 
        
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
        
        $data["title"] = "Tambah Data";
        $data["actor"] = "Mata Pelajaran";

        $this->form_validation->set_rules('matpel_nama','Nama/Kode Matpel','required');


        if ($this->form_validation->run() == FALSE){
            $this->load->view('matpel/tambah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $matpel->simpan();
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('matpel');
        }

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
        
        $data["title"] = "Ubah Data";
        $data["actor"] = "Kelas";

        $data['matpel'] = $matpel->getByid($id);
        $this->form_validation->set_rules('matpel_nama','NAMA/ID','required');


        if ($this->form_validation->run() == FALSE){
            $this->load->view('matpel/ubah',$data);
        } else{

            if(isset($_POST["submit"])) {
                $matpel->perbarui();
                $this->session->set_flashdata('flash', 'Ditambahkan');
            }
            redirect('matpel');
        }
        
    }

}