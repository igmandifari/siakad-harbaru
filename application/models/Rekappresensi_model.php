<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Rekappresensi_model extends CI_Model 
    {
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
    	public function getJadwal($id,$tahun)
        {
        return $this->db->query("SELECT jadwal.jadwal_id, matpel.matpel_nama FROM jadwal inner join rombel on rombel.rombel_id=jadwal.rombel_id INNER JOIN rombel_details on rombel_details.rombel_id=rombel.rombel_id INNER JOIN matpel on matpel.matpel_id=jadwal.matpel_id inner join tutor on tutor.tutor_id=jadwal.tutor_id WHERE jadwal.tahunajaran_id='$tahun' and rombel_details.wargabelajar_id='$id' AND jadwal.jadwal_tipe_pembelajaran!='Mandiri'")->result_array();
        }
        public function getPresensi($jadwal)
        {
            $this->db->where('jadwal_id',$jadwal);
            return $this->db->get('presensi')->result_array();
        }
        public function getAlpa($wb,$presensi)
        {
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as alpa FROM presensi_details WHERE presensi_details.wargabelajar_id='$wb' AND presensi_details.presensi_id='$presensi' AND presensi_details.presensi_det_ket='A'")->row_array();
        }
        public function getIzin($wb,$presensi)
        {
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as izin FROM presensi_details WHERE presensi_details.wargabelajar_id='$wb' AND presensi_details.presensi_id='$presensi' AND presensi_details.presensi_det_ket='I'")->row_array();
        }
        public function getHadir($wb,$presensi)
        {
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as hadir FROM presensi_details WHERE presensi_details.wargabelajar_id='$wb' AND presensi_details.presensi_id='$presensi' AND presensi_details.presensi_det_ket='H'")->row_array();
        }
        public function getSakit($wb,$presensi)
        {
            return $this->db->query("SELECT count(presensi_details.presensi_det_ket) as sakit FROM presensi_details WHERE presensi_details.wargabelajar_id='$wb' AND presensi_details.presensi_id='$presensi' AND presensi_details.presensi_det_ket='S'")->row_array();
        }
        public function getPertemuan($jadwal)
        {
            return $this->db->query("SELECT count(presensi.presensi_id) as pertemuan FROM presensi WHERE presensi.jadwal_id='$jadwal'")->row_array();
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
