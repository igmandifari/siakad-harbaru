<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Rekapnilai_model extends CI_Model 
    {
    	public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function getJadwal($id,$tahun)
        {
        return $this->db->query("SELECT jadwal.jadwal_id as idjadwal, matpel.matpel_nama as matpel, jadwal.jadwal_tipe_pembelajaran FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=jadwal.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id'")->result_array();
        }
        public function getIdNilai($jadwal,$wb)
        {
        	return $this->db->query("SELECT nilai.nilai_id as idnilai FROM nilai WHERE nilai.jadwal_id='$jadwal' AND nilai.wargabelajar_id='$wb'")->row_array();
        }
        public function sumTugas($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Tugas'")->row_array();
        }
        public function sumHarian($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Harian'")->row_array();
        }
        public function sumPTS($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PTS'")->row_array();
        }
        public function sumPAS($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAS'")->row_array();
        }
        public function sumPAT($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAT'")->row_array();
        }
        public function getNilai($idnilai)
        {
            return $this->db->query("SELECT SUM(nilai_details.nilai_details_nilai) / COUNT(nilai_details.nilai_details_nilai) as rata FROM nilai_details WHERE nilai_details.nilai_id='$idnilai'")->row_array();
        }
        public function get_tahun_ajaran($id)
        {
            $this->db->where('tahunajaran_id',$id);
            return $this->db->get('tahunajaran')->row_array();
        }
    }