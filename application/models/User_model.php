<<<<<<< HEAD
<?php

class User_model extends CI_Model {

    function cekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $user = $this->db->get('tbl_user')->row_array();
        return $user;

    }
=======
<?php

class User_model extends CI_Model {

    function cekLogin($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $user = $this->db->get('tbl_user')->row_array();
        return $user;

    }
>>>>>>> af0f2ad178a238a6bb1200567d50d285157192db
} 