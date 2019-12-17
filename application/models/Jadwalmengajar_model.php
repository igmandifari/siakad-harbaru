<?php

    class Jadwalmengajar_model extends CI_Model
    {

        public function getJadwalByIdTutor()
        {
            $id = $this->session->userdata('id');
            return $this->db->query("select jadwal.jadwal_tipe_pembelajaran, matpel.matpel_nama, kelas.kelas_nama, jadwal.jadwal_hari, jadwal.jadwal_waktu  from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id where matpel.tutor_id ='$id'")->result();

        }

    }
