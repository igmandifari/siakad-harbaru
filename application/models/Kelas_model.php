<?php

    Class Kelas_model extends CI_Model 
    {
        private $_table = "kelas";

        public function rules()
        {
            return[
                [
                    'field' => 'kelas_nama',
                    'label' => 'Nama Kelas',
                    'rules' => 'required|trim|xss_clean',
                ]
            ];
        }
        public function rules_rombel()
        {
            return[
                [
                    'field' => 'kelas_id',
                    'label' => 'Kelas',
                    'rules' => 'required|trim|xss_clean|callback_select_validate',
                ],
                [
                    'field' => 'tahunajaran_id',
                    'label' => 'Tahun Ajaran',
                    'rules' => 'required|trim|xss_clean|callback_select_validate',
                ]
            ];
        }
        public function simpan(){
            $data= array(
                'kelas_id'                  => uniqid(),
                'kelas_nama'                => $this->input->post("kelas_nama"),
                'created_at'                => date('Y-m-d H:i:s')
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'kelas_nama'                => $this->input->post("kelas_nama"),
                'updated_at'                => date('Y-m-d H:i:s')
            );
            $this->db->where('kelas_id',$this->input->post("kelas_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["kelas_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("kelas_id" => $id));
        }
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result();
        }
        public function getWargaBelajar(){
            return $this->db->get('wargabelajar')->result();
        }
        public function rombel_save(){
            $data = array(
                'kelas_id'              => $this->input->post("kelas_id"),
                'tahunajaran_id'        => $this->input->post("tahunajaran_id"),
                'wargabelajar_id'        => $this->input->post("wargabelajar_id"),
                'created_at'                => date('Y-m-d H:i:s')
            );
            return $this->db->insert("kelas_details",$data);
        }
    }
?>