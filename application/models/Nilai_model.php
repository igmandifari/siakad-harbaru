<?php
	class Nilai_model extends CI_Model
    {
        public $id;
        private $_table;
        public $wb;
        public $nilai;
        public $jenis_nilai;
        
            public function getTahunAjaran(){
                return $this->db->get('tahunajaran')->result_array();
            }
    		public function getKelas()
    		{
                $id     = $this->session->userdata('id');
                $tahun  = $this->session->userdata('tahunajaran_id');
                
                return $this->db->query("SELECT jadwal.jadwal_id, jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = jadwal.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'")->result();
            }
            public function getWargaBelajar($jadwal){
            	return $this->db->query("SELECT jadwal.jadwal_id, wargabelajar.wargabelajar_nomor_induk, wargabelajar.wargabelajar_id,wargabelajar.wargabelajar_nama FROM wargabelajar INNER JOIN rombel_details ON rombel_details.wargabelajar_id=wargabelajar.wargabelajar_id INNER JOIN rombel ON rombel.rombel_id=rombel_details.rombel_id INNER JOIN jadwal ON jadwal.rombel_id=rombel.rombel_id WHERE jadwal.jadwal_id='$jadwal'")->result_array();
            }
            public function checkAvailable($jadwal,$id){
            	return $this->db->query("SELECT * FROM nilai WHERE nilai.jadwal_id='$jadwal' AND nilai.wargabelajar_id='$id'")->result_array();
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
            public function getIDNIilai($jadwal,$id){
            	return $this->db->query("SELECT nilai.nilai_id FROM nilai WHERE nilai.jadwal_id='$jadwal' AND nilai.wargabelajar_id='$id'")->row_array();
            }
            public function insetToDet($data=array()){
            	return $this->db->insert('nilai_details',$data);
            }
            public function getnilai($id){
                $this->db->where('nilai_details_id',$id);
                return $this->db->get('nilai_details')->row_array();
            }
            public function updatenilai($id,$data=array()){
                $this->db->where('nilai_details_id',$id);
                return $this->db->update('nilai_details',$data);
            }
            public function getDataNilai($nilai){
            	return $this->db->query("SELECT * FROM nilai_details INNER JOIN nilai ON nilai.nilai_id=nilai_details.nilai_id WHERE nilai_details.nilai_id='$nilai' ORDER BY nilai_details.nilai_details_id DESC")->result_array();
            }
            public function calcHarian($nilai){
            	return $this->db->query("SELECT sum(nilai_details_nilai)as total, count(nilai_details_id) as banyak, sum(nilai_details_nilai)/count(nilai_details_id) as rata FROM nilai_details WHERE nilai_details.nilai_id='$nilai' AND nilai_details.nilai_details_jenis='Harian'")->row_array();
            }
            public function calcTugas($nilai){
                return $this->db->query("SELECT sum(nilai_details_nilai)as total, count(nilai_details_id) as banyak, sum(nilai_details_nilai)/count(nilai_details_id) as rata FROM nilai_details WHERE nilai_details.nilai_id='$nilai' AND nilai_details.nilai_details_jenis='Tugas'")->row_array();
            }
            public function calcPTS($nilai){
                return $this->db->query("SELECT sum(nilai_details_nilai)as total, count(nilai_details_id) as banyak, sum(nilai_details_nilai)/count(nilai_details_id) as rata FROM nilai_details WHERE nilai_details.nilai_id='$nilai' AND nilai_details.nilai_details_jenis='PTS'")->row_array();
            }
            public function calcPAS($nilai){
                return $this->db->query("SELECT sum(nilai_details_nilai)as total, count(nilai_details_id) as banyak, sum(nilai_details_nilai)/count(nilai_details_id) as rata FROM nilai_details WHERE nilai_details.nilai_id='$nilai' AND nilai_details.nilai_details_jenis='PAS'")->row_array();
            }
            public function calcPAT($nilai){
                return $this->db->query("SELECT sum(nilai_details_nilai)as total, count(nilai_details_id) as banyak, sum(nilai_details_nilai)/count(nilai_details_id) as rata FROM nilai_details WHERE nilai_details.nilai_id='$nilai' AND nilai_details.nilai_details_jenis='PAT'")->row_array();
            }
            public function hapusNilaiDet($id){
            	$this->db->where('nilai_details_id',$id);
            	return $this->db->delete('nilai_details');
            }
            public function getKelasAndMatpel($jadwal)
            {
                return $this->db->query("SELECT kelas.kelas_nama,matpel.matpel_nama FROM kelas INNER JOIN rombel ON rombel.kelas_id=kelas.kelas_id INNER JOIN jadwal ON jadwal.rombel_id=rombel.rombel_id  INNER JOIN matpel ON matpel.matpel_id=jadwal.matpel_id WHERE jadwal.jadwal_id='$jadwal'")->row_array();
            }
            public function countTugas($idnilai)
            {
                return $this->db->query("SELECT count(nilai_details_id) as tugas FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Tugas'")->row_array();
            }
            public function countHarian($idnilai)
            {
                return $this->db->query("SELECT count(nilai_details_id) as harian FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Harian'")->row_array();
            }
            public function countPTS($idnilai)
            {
                return $this->db->query("SELECT count(nilai_details_id) as pts FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PTS'")->row_array();
            }
            public function countPAS($idnilai)
            {
                return $this->db->query("SELECT count(nilai_details_id) as pas FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAS'")->row_array();
            }
            public function countPAT($idnilai)
            {
                return $this->db->query("SELECT count(nilai_details_id) as pat FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAT'")->row_array();
            }
            public function sumTugas($idnilai)
            {
                return $this->db->query("SELECT sum(nilai_details.nilai_details_nilai)/count(nilai_details.nilai_details_id) as tugas FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Tugas'")->row_array();
            }
            public function sumHarian($idnilai)
            {
                return $this->db->query("SELECT sum(nilai_details.nilai_details_nilai)/count(nilai_details.nilai_details_id) as harian FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='Harian'")->row_array();
            }
            public function sumPTS($idnilai)
            {
                return $this->db->query("SELECT sum(nilai_details.nilai_details_nilai)/count(nilai_details.nilai_details_id) as pts FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PTS'")->row_array();
            }
            public function sumPAS($idnilai)
            {
                return $this->db->query("SELECT sum(nilai_details.nilai_details_nilai)/count(nilai_details.nilai_details_id) as pas FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAS'")->row_array();
            }
            public function sumPAT($idnilai)
            {
                return $this->db->query("SELECT sum(nilai_details.nilai_details_nilai)/count(nilai_details.nilai_details_id) as pat FROM nilai_details WHERE nilai_details.nilai_id='$idnilai' AND nilai_details.nilai_details_jenis='PAT'")->row_array();
            }
            public function logs()
        {
            $this->load->library('user_agent');
            $data = array(
                'users'     => $this->session->userdata('id'),
                'level'     => $this->session->userdata('level'),
                'name'      => $this->session->userdata('nama'),
                'url'       => $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),
                'ip'        =>$this->input->ip_address(),
                'times'     => date('Y-m-d H:i:s'),
                'browser'   => $this->agent->browser().' '.$this->agent->version(),
                'os'        => $this->agent->platform()
            );
            return $this->db->insert('logs',$data);
        }


}
