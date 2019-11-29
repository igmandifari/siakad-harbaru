<?php

class Auth_model extends CI_Model {

    function cekLogin($username,$password){
        $this->db->where('admin_username',$username);
        $this->db->where('admin_password',md5($password));
        $user = $this->db->get('admin')->row_array();
        return $user;

    }
} 