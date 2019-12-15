<?php

class Jadwal_model extends CI_Model{

    private $_table = "jadwal";

    public function rules(){
        return[
            [
                'field' => 'kelas_id',
                'label' => 'Kelas',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_hari',
                'label' => 'Hari',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'matpel_id',
                'label' => 'Mata Pelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_waktu',
                'label' => 'Waktu',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ]
           
        ];
    }
    public function rules_tutorial_mandiri(){
        return[
            [
                'field' => 'kelas_id',
                'label' => 'Kelas',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'matpel_id',
                'label' => 'Mata Pelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_tipe_pembelajaran',
                'label' => 'Tipe Pembelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ]
        ];
    }
    public function simpan()
    {
        $data = array(
            'jadwal_id'                 => uniqid(),
            'jadwal_hari'               => $this->input->post("jadwal_hari"),
            'matpel_id'                 => $this->input->post("matpel_id"),
            'kelas_id'                  => $this->input->post("kelas_id"),
            'jadwal_waktu'              => $this->input->post("jadwal_waktu"),
            'jadwal_tipe_pembelajaran'  => 'Tatap Muka',
            'created_at'                => date('Y-m-d H:i:s')

        );
        return $this->db->insert($this->_table,$data);
    }

    public function perbarui()
    {
        $data = array(
            'jadwal_hari'           => $this->input->post("jadwal_hari"),
            'matpel_id'             => $this->input->post("matpel_id"),
            'kelas_id'              => $this->input->post("kelas_id"),
            'jadwal_waktu'              => $this->input->post("jadwal_waktu"),
            'updated_at'            => date('Y-m-d H:i:s')

        );
        $this->db->where('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
                
    public function save_tutorial_mandiri()
    {
        $data = array(
            'jadwal_id'                 => uniqid(),
            'jadwal_tipe_pembelajaran'  => $this->input->post("jadwal_tipe_pembelajaran"),
            'matpel_id'                 => $this->input->post("matpel_id"),
            'kelas_id'                  => $this->input->post("kelas_id"),
            'created_at'                => date('Y-m-d H:i:s')

        );
        return $this->db->insert($this->_table,$data);
    }
    public function update_tutorial_mandiri()
    {
        $data = array(
            'matpel_id'                      => $this->input->post("matpel_id"),
            'kelas_id'                       => $this->input->post("kelas_id"),
            'jadwal_tipe_pembelajaran'       => $this->input->post("jadwal_tipe_pembelajaran"),
            'updated_at'                     => date('Y-m-d H:i:s')

        );
        $this->db->where('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
    public function getAll()
    {
            $query = $this->db->query("select * from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id inner join tutor on tutor.tutor_id = matpel.tutor_id;");
            return $query->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jadwal_id" => $id])->row_array();
    }
    
    public function delete($id){
        return $this->db->delete($this->_table, array("jadwal_id" => $id));
    }
    public function getKelas(){
        return $this->db->get("kelas")->result();
    }
    public function getMatpel(){
        return $this->db->get("matpel")->result();
    }
}