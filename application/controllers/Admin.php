<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller
    {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MASUK') != TRUE){
            $url=base_url();
            redirect($url);
        }
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        
    }

    public function index()
    {

        $data["title"] = "Data Admin";
        $data["actor"] = "admin";
        $data["admins"] = $this->Admin_model->getAll();
    
        $this->load->view('admin/list',$data);
    }

    public function tambah()
    {
        $admin = $this->Admin_model;
        
        

        $this->form_validation->set_rules('admin_nama','NAMA/ID','required');


        if ($this->form_validation->run()){
            $admin->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            
        }
        $data["title"] = "Tambah Data";
        $data["actor"] = "admin";
        $this->load->view('admin/tambah',$data);
    
    }

    public function hapus($id=null)
    {
        if(!isset($id)){
            redirect('admin');
        }else{
            $this->Admin_model->delete($id);
            redirect('admin');
        }
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('admin');
        $admin = $this->Admin_model;
        
        
        $this->form_validation->set_rules('admin_nama','NAMA/ID','required');


        if ($this->form_validation->run()){
            $admin->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        } 

        $data["title"] = "Ubah Data";
        $data["actor"] = "admin";
        $data['admin'] = $admin->getByid($id);

        $this->load->view('admin/ubah',$data);
           
        
        
        
    }

}