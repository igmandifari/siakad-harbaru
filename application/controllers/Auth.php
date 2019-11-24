<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        if(isset($_POST["submit"])){
            $username = $this->input->post('login-username');
            $password = $this->input->post('login-password');
            $loginAdmin = $this->Auth_model->cek_login($username, $password);

            if (!empty($loginAdmin)) {
                // sukses login user
                $this->session->set_userdata($loginAdmin);
                redirect('tutor');
            // } elseif (!empty($loginGuru)) {
            //     // login guru
            //     $session = array(
            //         'nama_lengkap'  =>  $loginGuru['nama_guru'],
            //         'id_level_user' =>  3,
            //         'id_guru'       =>  $loginGuru['id_guru']);
            //     $this->session->set_userdata($session);
            //     redirect('jadwal');
            // } else {
            //     // gagal login
            //     redirect('auth');
            // }
        } 
    }
    else{
        $data["title"] = "Sign in untuk masuk";
        $this->load->view('auth/login',$data);
        }
        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}