<?php

    Class Matpel_model extends CI_Model 
    {
        private $_table = "matpel";
      
        public function rules()
        {
            return[
                [
                    'field' => 'matpel_nama',
                    'label' => 'Nama Mata Pelajaran',
                    'rules' => 'required|trim|xss_clean',
                ]
            ];
        }

        public function simpan(){
            $data= array(
                'matpel_id'                  => uniqid(),
                'matpel_nama'                => $this->input->post("matpel_nama")
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'matpel_nama'                => $this->input->post("matpel_nama")
            );
            $this->db->where('matpel_id',$this->input->post("matpel_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["matpel_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("matpel_id" => $id));
        }
    }
?>