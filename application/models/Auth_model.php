<?php

    Class Auth_model extends CI_Model 
    {
      
        public function cek_login($username,$password)
        {
            $this->db->where('administrator_username',$username);
            $this->db->where('administrator_sandi',  md5(sha1($password)));
            $user = $this->db->get("administrator")->row_array();
            return $user;
        }
    }
?>