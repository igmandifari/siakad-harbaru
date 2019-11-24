<?php

    Class Auth_model extends CI_Model 
    {
      
<<<<<<< HEAD
        public function cek_login($username,$password)
        {
            $this->db->where('administrator_username',$username);
            $this->db->where('administrator_sandi',  md5(sha1($password)));
            $user = $this->db->get("administrator")->row_array();
            return $user;
=======
        function cekLogin($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',md5($password));
            $user = $this->db->get('tbl_user')->row_array();
            return $user;
    
>>>>>>> 7d1a9c172eef389cf4f054448f50f53dc0cc1bbb
        }
    }
?>