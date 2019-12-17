<?php
    class Presensi_model extends CI_Model
    {
        public function getKelas()
        {
            $id = $this->session->userdata('id');
            
            return $this->db->query("select * from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id inner join tutor on tutor.tutor_id = '$id' WHERE jadwal_tipe_pembelajaran = 'Tatap Muka'")->result();
        }
    }