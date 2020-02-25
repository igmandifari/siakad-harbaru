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
    public function getTahunAjaran(){
        return $this->db->get('tahunajaran')->result_array();
    }
    public function getJadwalByIdTutor()
        {
            $id     = $this->session->userdata('id');
            $tahun  = $this->session->userdata('tahunajaran_id');
            
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = matpel.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'")->result();

        }
}