<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller
    {

    public function __construct()
    {
        parent::__construct();
        $url=base_url();
        if($this->session->userdata('MASUK') != TRUE)redirect($url);
        if($this->session->userdata('level') != 0) redirect("dasbor");
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
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
        $validasi = $this->form_validation;
        $validasi->set_rules($admin->rules());

        if ($validasi->run()){
            $admin->simpan();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('admin');
            
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
    public function ubah_password(){
        $admin = $this->Admin_model;

        $this->form_validation->set_rules('admin_password','Password','min_length[5]');

        if ($this->form_validation->run()){
           $admin->perbarui_password();
            $this->session->set_flashdata('success', 'Berhasil');
            redirect('admin');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal');
            redirect('admin');
        } 
    }

    public function ubah($id=null)
    {
        if(!isset($id)) redirect('admin');

        $admin = $this->Admin_model;

        $this->form_validation->set_rules('admin_nama','Nama','required|trim|xss_clean|min_length[7]');        
        $this->form_validation->set_rules('admin_username','Username','required|trim|callback_username_check_blank|xss_clean|min_length[7]');
        //$this->form_validation->set_rules('admin_password','Password','min_length[7]');

        if ($this->form_validation->run()){
           $admin->perbarui();
            $this->session->set_flashdata('success', 'Berhasil');
        } 

        $data["title"] = "Ubah Data";
        $data["actor"] = "admin";
        $data["admin"] = $admin->getByid($id);
 
        if(!$data['admin']) redirect('admin');

        $this->load->view('admin/ubah',$data);        
    }

    public function username_check_blank($str)
    {

    $pattern = '/ /';
    $result = preg_match($pattern, $str);

    if ($result)
    {
        $this->form_validation->set_message('username_check_blank', 'Kolom {field} dilarang menggunakan spasi');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
    }

}