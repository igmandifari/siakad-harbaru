<?php
    class Presensi_model extends CI_Model
    {
        public function getKelas()
        {
            $id     = $this->session->userdata('id');
            $tahun  = $this->session->userdata('tahunajaran_id');
            
            return $this->db->query("SELECT jadwal.jadwal_id, jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = matpel.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'AND jadwal.jadwal_tipe_pembelajaran='Tatap Muka'")->result();
        }
        public function getPertemuan($id)
        {
            return $this->db->get_where('presensi', ["jadwal_id" => $id])->result();   
        }
        public function getSiswaByRombel($id){
            return $this->db->query("select wargabelajar.wargabelajar_id, wargabelajar.wargabelajar_nama from wargabelajar INNER JOIN rombel_details on rombel_details.wargabelajar_id=wargabelajar.wargabelajar_id INNER JOIN jadwal on jadwal.rombel_id=rombel_details.rombel_id WHERE jadwal.jadwal_id='$id'")->result();
        }
        public function NewPresensi(){
            $data = array(
                'presensi_id'       => $this->input->post('presensi_id'),
                'jadwal_id'         => $this->input->post('jadwal_id'),
                'presensi_tanggal'  => date('Y-m-d'),
                'created_at'        => date('Y-m-d H:i:s')
            );

            return $this->db->insert('presensi',$data);
        }
        public function PresensiDet($data=array()){
            return $this->db->insert('presensi_details',$data);
        }
        public function getPresensiDet($pertemuan){
            return $this->db->query("SELECT wargabelajar.wargabelajar_id, wargabelajar.wargabelajar_nama, presensi_details.presensi_id, presensi_details.presensi_det_id,presensi_details.presensi_det_ket from presensi_details INNER JOIN wargabelajar on wargabelajar.wargabelajar_id=presensi_details.wargabelajar_id WHERE presensi_details.presensi_id='$pertemuan'")->result();

        }
        public function updatePresensiDet($data=array(),$presensi_det_id){
            $this->db->where('presensi_det_id',$presensi_det_id);
            return $this->db->update('presensi_details',$data);
        }
        public function details($jadwal){
            return $this->db->query("SELECT sum(presensi_details.presensi_det_ket='A') as alpa,sum(presensi_details.presensi_det_ket='H') as hadir,sum(presensi_details.presensi_det_ket='I') as izin,sum(presensi_details.presensi_det_ket='S') as sakit, wargabelajar.wargabelajar_id, wargabelajar.wargabelajar_nama, presensi_details.presensi_id, presensi_details.presensi_det_id,presensi_details.presensi_det_ket from presensi_details INNER JOIN wargabelajar on wargabelajar.wargabelajar_id=presensi_details.wargabelajar_id inner join presensi on presensi.presensi_id=presensi_details.presensi_id WHERE presensi.jadwal_id='$jadwal'")->row_array();
        }
    }