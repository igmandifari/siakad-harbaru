<?php

    Class Kelas_model extends CI_Model 
    {
        private $_table = "kelas";
      
        public function simpan(){
            $data= array(
                'kelas_id'                  => uniqid(),
                'kelas_nama'                => $this->input->post("kelas_nama")
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'kelas_nama'                => $this->input->post("kelas_nama")
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
    }
?>