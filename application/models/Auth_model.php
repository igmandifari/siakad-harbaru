<?php

class Auth_model extends CI_Model {

    public function rules(){
        return[
           
            [
                'field'     => 'username',
                'label'     => 'username',
                'rules'     => 'required|trim|xss_clean',

            ],
            [
                'field'     => 'password',
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
} 