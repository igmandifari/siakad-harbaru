<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Jadwalbelajar_model extends CI_Model 
    {
        public function getJadwal($id,$tahun,$hari)
        {
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran,jadwal.jadwal_hari,jadwal.jadwal_waktu,tutor.tutor_nama,matpel.matpel_nama FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=matpel.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id' AND jadwal.jadwal_hari='$hari'")->result_array();
        }
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function getHari($tahun){
            return $this->db->query("SELECT DISTINCT jadwal.jadwal_hari as hari FROM jadwal WHERE jadwal.tahunajaran_id='$tahun' AND jadwal.jadwal_hari IS NOT NULL")->result_array();
        }
        public function getOther($id,$tahun){
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran as tipe,jadwal.jadwal_hari,jadwal.jadwal_waktu,tutor.tutor_nama,matpel.matpel_nama FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=matpel.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id' AND jadwal.jadwal_tipe_pembelajaran != 'Tatap Muka'")->result_array();
        }

    }