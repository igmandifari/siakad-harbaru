<?php

class Jadwal_model extends CI_Model{

    private $_table = "jadwal";
    private $_tutor = "tutor";
    private $_kelas = "kelas";
    private $_matpel = "matpel";

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
        $this->db->where('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
    
    public function getAll()
    {
//         $this->db->select('*');
//         $this->db->from($this->_table);
//         $this->db->join($this->_kelas,'kelas.kelas_id=jadwal.kelas_id');
//         $this->db->join($this->tutor,'tutor.tutor_id=jadwal.tutor_id');
//         $this->db->join($this->_matpel,'matpel.matpel_id=jadwal.matpel_id');
        
//         $query = $this->db->get();
//  return $query->result();
            $query = $this->db->query("SELECT * FROM jadwal INNER JOIN kelas ON kelas.kelas_id=jadwal.kelas_id INNER JOIN tutor ON tutor.tutor_id=jadwal.tutor_id INNER JOIN matpel ON matpel.matpel_id=jadwal.matpel_id");
            return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jadwal_id" => $id])->row_array();
    }
    
    public function delete($id){
        return $this->db->delete($this->_table, array("jadwal_id" => $id));
    }

}