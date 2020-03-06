<?php

class Auth_model extends CI_Model {
    public $username;
    public $password;
    public $level;  

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
        return $this->db->query("SELECT * FROM tahunajaran ORDER BY tahunajaran.tahunajaran_nama DESC LIMIT 1")->row_array();
    }
    public function logs()
        {
            $this->load->library('user_agent');
            $data = array(
                'users'     => $this->session->userdata('id'),
                'level'     => $this->session->userdata('level'),
                'name'      => $this->session->userdata('nama'),
                'url'       => $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),
                'ip'        =>$this->input->ip_address(),
                'times'     => date('Y-m-d H:i:s'),
                'browser'   => $this->agent->browser().' '.$this->agent->version(),
                'os'        => $this->agent->platform()
            );
            return $this->db->insert('logs',$data);
        }

} 