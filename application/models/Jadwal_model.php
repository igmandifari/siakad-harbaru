<?php

class Jadwal_model extends CI_Model{

    private $_table = "jadwal";

    public function simpan()
    {
        $data = array(
            'jadwal_id'             => uniqid(),
            'jadwal_hari'           => $this->input->post("jadwal_hari"),
            'tutor_id'              => $this->input->post("tutor_id"),
            'matpel_id'             => $this->input->post("matpel_id"),
            'kelas_id'              => $this->input->post("kelas_id"),
            'jadwal_jam_mulai'      => $this->input->post("jadwal_jam_mulai"),
            'jadwal_jam_berakhir'   => $this->input->post("jadwal_jam_berakhir")

        );
        return $this->db->insert($this->_table,$data);
    }

    public function perbarui()
    {
        $data = array(
            'jadwal_hari'           => $this->input->post("jadwal_hari"),
            'tutor_id'              => $this->input->post("tutor_id"),
            'matpel_id'             => $this->input->post("matpel_id"),
            'kelas_id'              => $this->input->post("kelas_id"),
            'jadwal_jam_mulai'      => $this->input->post("jadwal_jam_mulai"),
            'jadwal_jam_berakhir'   => $this->input->post("jadwal_jam_berakhir")

        );
        $this->db->update('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jadwal_id" => $id])->row_array();
    }
    
    public function delete($id){
        return $this->db->delete($this->_table, array("jadwal_id" => $id));
    }

}