<?php

class Auth_model extends CI_Model {

    public function rules(){
        return[
           
            [
                'field'     => 'login-username',
                'label'     => 'username',
                'rules'     => 'required|trim|xss_clean',

            ],
            [
                'field'     => 'login-password',
                'label'     => 'password',
                'rules'     => 'required|xss_clean',
            ],
            [
                'field'     => 'tahunajaran_id',
                'label'     => 'Tahun Ajaran',
                'rules'     => 'required|xss_clean|callback_select_validate',
            ]
        ];
    }

    public function cekLogin($username,$password){
        $this->db->where('admin_username',$username);
        $this->db->where('admin_password',md5(sha1($password)));
        $user = $this->db->get('admin')->row_array();
        return $user;

    }
    public function cekLogin_tutor($username,$password){
        $this->db->where('tutor_nomor_induk',$username);
        $this->db->where('tutor_password',md5(sha1($password)));
        $user = $this->db->get('tutor')->row_array();
        return $user;
    }
    public function cek_login_pimpinan($username,$password){
        $this->db->where('pimpinan_username',$username);
        $this->db->where('pimpinan_password',md5(sha1($password)));
        $user = $this->db->get('pimpinan')->row_array();
        return $user;
    }
    public function cek_login_wargabelajar($username,$password){
        $this->db->where('wargabelajar_nomor_induk',$username);
        $this->db->where('wargabelajar_password',md5(sha1($password)));
        $user = $this->db->get('wargabelajar')->row_array();
        return $user;
    }
    public function getTahunAjaran(){
        return $this->db->get('tahunajaran')->result();
    }
    public function getAjaranByID($tahunajaran){
        $this->db->where('tahunajaran_id', $tahunajaran);
        return $this->db->get('tahunajaran')->row_array();
    }
} 