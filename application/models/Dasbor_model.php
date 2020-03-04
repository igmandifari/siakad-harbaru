<?php

class Dasbor_model extends CI_Model {
    public $nm_wb;
    public $nm_pimpinan;
    public $nm_admin;
    public $nm_tutor;
    public $level;



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
            
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = jadwal.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'")->result();

        }
        
        public function getHari($tahun){
            return $this->db->query("SELECT DISTINCT jadwal.jadwal_hari as hari FROM jadwal WHERE jadwal.tahunajaran_id='$tahun' AND jadwal.jadwal_hari IS NOT NULL")->result_array();
        }
        public function getOther($id,$tahun){
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran as tipe,jadwal.jadwal_hari,jadwal.jadwal_waktu,tutor.tutor_nama,matpel.matpel_nama FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=jadwal.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id' AND jadwal.jadwal_tipe_pembelajaran != 'Tatap Muka'")->result_array();
        }
        public function getJadwal($id,$tahun,$hari)
        {
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran,jadwal.jadwal_hari,jadwal.jadwal_waktu,tutor.tutor_nama,matpel.matpel_nama FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=jadwal.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id' AND jadwal.jadwal_hari='$hari'")->result_array();
        }
        public function get_tahun_ajaran($id)
        {
            $this->db->where('tahunajaran_id',$id);
            return $this->db->get('tahunajaran')->row_array();
        }
}