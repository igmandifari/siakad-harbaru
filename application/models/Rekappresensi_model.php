<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Jadwalbelajar_model extends CI_Model 
    {
    	public function get($id,$tahun)
    	{
    		return $this->db->query("SELECT count(presensi_details.presensi_det_ket='A') as alpa,count(presensi_details.presensi_det_ket='I') as izin,count(presensi_details.presensi_det_ket='H') as hadir,count(presensi_details.presensi_det_ket='S') as sakit FROM presensi INNER JOIN jadwal ON jadwal.jadwal_id=presensi.jadwal_id INNER JOIN presensi_details ON presensi_details.presensi_id=presensi.presensi_id  WHERE jadwal.tahunajaran_id='5dfc3970e4387' and presensi_details.wargabelajar_id='5df8c9b8e20e9'")->row_array();
    	}
    }
