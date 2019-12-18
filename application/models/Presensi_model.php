<?php
    class Presensi_model extends CI_Model
    {
        public function getKelas()
        {
            $id = $this->session->userdata('id');
            
            return $this->db->query("select jadwal.jadwal_id,matpel.matpel_nama, kelas.kelas_nama, jadwal.jadwal_hari, jadwal.jadwal_waktu from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id WHERE jadwal.jadwal_tipe_pembelajaran='Tatap Muka' AND matpel.tutor_id='$id'")->result();
        }
        public function getPertemuan($id)
        {
            return $this->db->get_where('presensi', ["jadwal_id" => $id])->row_array();   
        }
    }