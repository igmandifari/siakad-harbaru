<?php

    class Jadwalmengajar_model extends CI_Model
    {

        public function getJadwalByIdTutor()
        {
            $id = $this->session->userdata('id');
            return $this->db->query("select * from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id inner join tutor on tutor.tutor_id = '$id'")->result();

        }

    }
