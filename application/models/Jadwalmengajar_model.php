<?php

    class Jadwalmengajar_model extends CI_Model
    {

        public function getJadwalByIdTutor()
        {
            $id     = $this->session->userdata('id');
            $tahun  = $this->session->userdata('tahunajaran_id');
            
            return $this->db->query("SELECT jadwal.jadwal_id,jadwal.jadwal_tipe_pembelajaran, jadwal.jadwal_hari,jadwal.jadwal_waktu, matpel.matpel_nama,kelas.kelas_nama from jadwal INNER join matpel on matpel.matpel_id=jadwal.matpel_id INNER JOIN rombel on rombel.rombel_id=jadwal.rombel_id INNER join kelas on kelas.kelas_id = rombel.kelas_id INNER JOIN tutor on tutor.tutor_id = jadwal.tutor_id INNER JOIN tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id where tutor.tutor_id='$id' AND tahunajaran.tahunajaran_id='$tahun'")->result();

        }
        public function getTahunAjaran(){
	        return $this->db->get('tahunajaran')->result_array();
	    }
        public function getJadwal($tahun)
        {
            return $this->db->query("SELECT tahunajaran.tahunajaran_nama,tutor.tutor_nama, tahunajaran.tahunajaran_id, jadwal.jadwal_id, jadwal.jadwal_hari, matpel.matpel_nama, kelas.kelas_nama, jadwal.jadwal_waktu, jadwal.jadwal_tipe_pembelajaran FROM jadwal left join tahunajaran on tahunajaran.tahunajaran_id = jadwal.tahunajaran_id RIGHT join rombel on rombel.rombel_id = jadwal.rombel_id inner join kelas on kelas.kelas_id = rombel.kelas_id LEFT join matpel on matpel.matpel_id=jadwal.matpel_id  INNER join tutor on tutor.tutor_id = jadwal.tutor_id where jadwal.tahunajaran_id ='$tahun' ORDER BY jadwal.jadwal_tipe_pembelajaran ASC, jadwal.jadwal_hari ASC")->result();
    
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
