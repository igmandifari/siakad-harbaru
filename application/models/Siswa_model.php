<?php
    class Siswa_model extends CI_Model{
        public function getAll(){
            
            return $this->db->get('siswa')->result();
        }
    }
?>