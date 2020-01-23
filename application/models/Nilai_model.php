<?php
	class Nilai_model extends CI_Model {
		public function getKelas()
		{
            $id     = $this->session->userdata('id');
            $tahun  = $this->session->userdata('tahunajaran_id');
            
            return $this->db->query("SELECT jadwal.jadwal_id, jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = matpel.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'")->result();
        }
        public function getWargaBelajar($jadwal){
        	return $this->db->query("SELECT jadwal.jadwal_id, wargabelajar.wargabelajar_id,wargabelajar.wargabelajar_nama FROM wargabelajar INNER JOIN rombel_details ON rombel_details.wargabelajar_id=wargabelajar.wargabelajar_id INNER JOIN rombel ON rombel.rombel_id=rombel_details.rombel_id INNER JOIN jadwal ON jadwal.rombel_id=rombel.rombel_id WHERE jadwal.jadwal_id='5dfc9da09b91e'")->result_array();
        }
        public function checkAvailable($semseter,$jadwal,$id){
        	return $this->db->query("SELECT * FROM nilai WHERE nilai.nilai_semester='$semseter' AND nilai.jadwal_id='$jadwal' AND nilai.wargabelajar_id='$id'")->result_array();
        }
        public function insertNilai($data=array()){
        	return $this->db->insert('nilai',$data);
        }
        public function getDataWargaBelajar($id){
        	$this->db->where('wargabelajar_id',$id);
        	return $this->db->get('wargabelajar')->row_array();
        }
        public function getNameMatpel($jadwal){
        	return $this->db->query("SELECT matpel.matpel_nama FROM jadwal INNER JOIN matpel ON matpel.matpel_id=jadwal.matpel_id WHERE jadwal.jadwal_id='$jadwal'")->row_array();
        }
        public function getIDNIilai($jadwal){
        	return $this->db->query("SELECT nilai.nilai_id FROM nilai WHERE nilai.jadwal_id='$jadwal'")->row_array();
        }
        public function insetToDet($data=array()){
        	return $this->db->insert('nilai_details',$data);
        }
        public function getDataNilai($nilai){
        	return $this->db->query('SELECT * FROM nilai_details ORDER BY nilai_details_id DESC')->result_array();
        }


}
