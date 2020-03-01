<?php

class Auth extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->helper('security');
    }
    
    public function index(){

        if($this->session->userdata('MASUK') == TRUE){
            redirect("dasbor");
        }
        $data["title"] = "Login - Siak Harba";
        $data["tahunajaranAll"] = $this->Auth_model->getTahunAjaran();
        $this->load->view('auth/login',$data);
         
    }

    public function cek_login() {
        $validasi = $this->form_validation;
        $validasi->set_rules($this->Auth_model->rules());

        if ($validasi->run()) {
          
            $username    = $this->security->xss_clean($this->input->post('login-username'));
            $password    = $this->security->xss_clean($this->input->post('login-password'));
            
        
            $Admin          = $this->Auth_model->cekLogin($username,$password);
            $WargaBelajar   = $this->Auth_model->cek_login_wargabelajar($username,$password);
            $Pimpinan       = $this->Auth_model->cek_login_pimpinan($username,$password);
            $tutor          = $this->Auth_model->cekLogin_tutor($username,$password);

            $tahunajaran = $this->Auth_model->getTahunAjaran();
            

            if (!empty($Admin)) {
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'                  => $Admin['admin_nama'],
                    'id'                    => $Admin['admin_id'],
                    'foto'                  => $Admin['admin_foto'],
                    'tahunajaran_id'        => $tahunajaran['tahunajaran_id'],
                    'tahunajaran_nama'      => $tahunajaran['tahunajaran_nama'],
                    'level' => 0
                );
                $this->session->set_userdata($session);
                redirect('dasbor');
            }elseif(!empty($WargaBelajar)){
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'                  => $WargaBelajar['wargabelajar_nama'],
                    'induk'                  => $WargaBelajar['wargabelajar_nomor_induk'],
                    'id'                    => $WargaBelajar['wargabelajar_id'],
                    'foto'                  => $WargaBelajar['wargabelajar_foto'],
                    'level'                 => 1,
                    'tahunajaran_id'        => $tahunajaran['tahunajaran_id'],
                    'tahunajaran_nama'      => $tahunajaran['tahunajaran_nama'],
                    'open_nilai'            => $tahunajaran['open_nilai']
                );
                $this->session->set_userdata($session);
                redirect('dasbor');
            } elseif(!empty($Pimpinan)){
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'  => $Pimpinan['pimpinan_nama'],
                    'id'    => $Pimpinan['pimpinan_id'],
                    'foto'  => $Pimpinan['pimpinan_foto'],
                    'level' => 2
                );
                $this->session->set_userdata($session);
                redirect('dasbor');
            } elseif(!empty($tutor)){
                $this->session->set_userdata('MASUK',TRUE);
                $session = array(
                    'nama'                  => $tutor['tutor_nama'],
                    'id'                    => $tutor['tutor_id'],
                    'foto'                  => $tutor['tutor_foto'],
                    'level'                 => 3,
                    'tahunajaran_id'        => $tahunajaran['tahunajaran_id'],
                    'tahunajaran_nama'      => $tahunajaran['tahunajaran_nama'],
                );
                $this->session->set_userdata($session);
                redirect('dasbor');
            }else {
                $this->session->set_flashdata('warning', 'Silahkan cek kembali');
                redirect('auth');
            }
    }else{
        $this->session->set_flashdata('failed', 'Akun tidak ditemukan');
        redirect('auth');
    }
}

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
   

}