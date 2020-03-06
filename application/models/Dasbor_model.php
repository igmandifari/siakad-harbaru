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
        return $this->db->query("SELECT * FROM tahunajaran ORDER BY tahunajaran.tahunajaran_nama DESC")->result_array();
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

        public function getWargabelajars()
        {
            return $this->db->get('wargabelajar')->result();
        }
        public function getTutors()
        {
            return $this->db->get('tutor')->result();
        }
        public function getjadwals($tahun)
        {
            return $this->db->query("SELECT * FROM jadwal INNER JOIN matpel ON matpel.matpel_id=jadwal.matpel_id INNER JOIN tutor ON tutor.tutor_id=jadwal.tutor_id INNER JOIN rombel ON rombel.rombel_id=jadwal.rombel_id INNER JOIN kelas ON kelas.kelas_id=rombel.kelas_id WHERE jadwal.tahunajaran_id='$tahun'")->result();
        }
        public function getNameKelas($id)
        {
            return $this->db->query("SELECT tutor.tutor_nama, matpel.matpel_nama,kelas.kelas_nama FROM jadwal LEFT JOIN matpel ON matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id RIGHT JOIN kelas on kelas.kelas_id=rombel.kelas_id LEFT JOIN tutor on tutor.tutor_id=jadwal.tutor_id WHERE jadwal.jadwal_id='$id'")->row_array();
        }
        public function getDate($jadwal){
            return $this->db->query("SELECT presensi.presensi_tanggal as tanggal,presensi.presensi_id as id FROM presensi WHERE presensi.jadwal_id='$jadwal'")->result();
        }
        public function getWb($idpresensi){
            return $this->db->query("SELECT presensi_details.wargabelajar_id as id, wargabelajar.wargabelajar_nama, wargabelajar.wargabelajar_nomor_induk FROM presensi_details RIGHT JOIN wargabelajar ON wargabelajar.wargabelajar_id=presensi_details.wargabelajar_id WHERE presensi_details.presensi_id='$idpresensi'")->result();

        }
        public function getAlpa($jadwal,$id){
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as alpa FROM presensi_details INNER JOIN presensi ON presensi.presensi_id=presensi_details.presensi_id WHERE presensi_details.wargabelajar_id='$id' AND presensi_details.presensi_det_ket='A' AND presensi.jadwal_id='$jadwal'")->row_array();
        }
        public function getizin($jadwal,$id){
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as izin FROM presensi_details INNER JOIN presensi ON presensi.presensi_id=presensi_details.presensi_id WHERE presensi_details.wargabelajar_id='$id' AND presensi_details.presensi_det_ket='I' AND presensi.jadwal_id='$jadwal'")->row_array();
        }
        public function getSakit($jadwal,$id){
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as sakit FROM presensi_details INNER JOIN presensi ON presensi.presensi_id=presensi_details.presensi_id WHERE presensi_details.wargabelajar_id='$id' AND presensi_details.presensi_det_ket='S' AND presensi.jadwal_id='$jadwal'")->row_array();
        }
        public function getHadir($jadwal,$id){
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as hadir FROM presensi_details INNER JOIN presensi ON presensi.presensi_id=presensi_details.presensi_id WHERE presensi_details.wargabelajar_id='$id' AND presensi_details.presensi_det_ket='H' AND presensi.jadwal_id='$jadwal'")->row_array();
        }
        public function countTotal($jadwal,$id){
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as total FROM presensi_details INNER JOIN presensi ON presensi.presensi_id=presensi_details.presensi_id WHERE presensi_details.wargabelajar_id='$id' AND presensi.jadwal_id='$jadwal'")->row_array();
        }
        public function getIDPresensi($jadwal){
            return $this->db->query("SELECT presensi.presensi_id FROM presensi WHERE presensi.jadwal_id='$jadwal' LIMIT 1")->row_array();
        }
        public function getDetailBanget($id,$wb)
        {
            return $this->db->query("SELECT presensi_details.presensi_det_ket as ket FROM presensi_details WHERE presensi_details.presensi_id='$id' AND presensi_details.wargabelajar_id='$wb'")->row_array();
        }
        public function getWargaBelajar($jadwal){
                return $this->db->query("SELECT jadwal.jadwal_id, wargabelajar.wargabelajar_nomor_induk, wargabelajar.wargabelajar_id,wargabelajar.wargabelajar_nama FROM wargabelajar INNER JOIN rombel_details ON rombel_details.wargabelajar_id=wargabelajar.wargabelajar_id INNER JOIN rombel ON rombel.rombel_id=rombel_details.rombel_id INNER JOIN jadwal ON jadwal.rombel_id=rombel.rombel_id WHERE jadwal.jadwal_id='$jadwal'")->result_array();
            }
        public function getKelasAndMatpel($jadwal)
            {
                return $this->db->query("SELECT tutor.tutor_nama, kelas.kelas_nama,matpel.matpel_nama FROM kelas INNER JOIN rombel ON rombel.kelas_id=kelas.kelas_id INNER JOIN jadwal ON jadwal.rombel_id=rombel.rombel_id  INNER JOIN matpel ON matpel.matpel_id=jadwal.matpel_id INNER JOIN tutor ON tutor.tutor_id=jadwal.tutor_id WHERE jadwal.jadwal_id='$jadwal'")->row_array();
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
            public function getIDNIilai($jadwal,$id){
                return $this->db->query("SELECT nilai.nilai_id FROM nilai WHERE nilai.jadwal_id='$jadwal' AND nilai.wargabelajar_id='$id'")->row_array();
            }
}