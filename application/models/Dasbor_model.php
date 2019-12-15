<?php

class Dasbor_model extends CI_Model {

    public function countWargaBelajar(){
        $query= $this->db->query("SELECT COUNT(wargabelajar_id) as jumlah FROM wargabelajar WHERE wargabelajar_status='Aktif'");
        return $query->row_array();

    }
    public function countTutor(){
        $query= $this->db->query("SELECT COUNT(tutor_id) as jumlah FROM tutor");
        return $query->row_array();
    }
    public function countPimpinan(){
        $query= $this->db->query("SELECT COUNT(pimpinan_id) as jumlah FROM pimpinan");
        return $query->row_array();
    }
    public function countAdmin(){
        $query= $this->db->query("SELECT COUNT(admin_id) as jumlah FROM admin");
        return $query->row_array();
    }
}