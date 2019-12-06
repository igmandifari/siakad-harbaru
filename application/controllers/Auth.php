<?php

class Auth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Auth_model');
        $this->load->model('Wargabelajar_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }
    
    public function index(){
        if($this->session->userdata('MASUK') == TRUE){
            redirect("wargabelajar");
        }
        $data["title"] = "Login - Siak Harba";
        $this->load->view('auth/login',$data);
         
    }

    public function cek_login() {
        $validasi = $this->form_validation;
        $validasi->set_rules($this->Auth_model->rules());

        if ($validasi->run()) {
          
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $Admin = $this->Auth_model->cekLogin($username,$password);
            $WargaBelajar = $this->Wargabelajar_model->cek_login($username,$password);

            if (!empty($Admin)) {
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'  => $Admin['admin_nama'],
                    'id'    => $Admin['admin_id'],
                    'foto'  => $Admin['admin_foto'],
                    'level' => 0
                );
                $this->session->set_userdata($session);
                redirect('wargabelajar');
            }elseif(!empty($WargaBelajar)){
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'  => $WargaBelajar['wargabelajar_nama'],
                    'id'    => $WargaBelajar['wargabelajar_nama'],
                    'foto'  => $WargaBelajar['wargabelajar_foto'],
                    'level' => 1
                );
                $this->session->set_userdata($session);
                redirect('dasbor');
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }

}