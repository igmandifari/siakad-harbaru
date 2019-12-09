<?php

    Class Tahunajaran_model extends CI_Model 
    {
        private $_table = "tahunajaran";
      
        public function rules()
        {
            return[
                [
                    'field' => 'tahunajaran_nama',
                    'label' => 'Nama Tahun Ajaran',
                    'rules' => 'required|trim|xss_clean',
                ]
            ];
        }

        public function simpan(){
            $data= array(
                'tahunajaran_id'                  => uniqid(),
                'tahunajaran_nama'                => $this->input->post("tahunajaran_nama")
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'tahunajaran_nama'                => $this->input->post("tahunajaran_nama")
            );
            $this->db->where('tahunajaran_id',$this->input->post("tahunajaran_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["tahunajaran_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("tahunajaran_id" => $id));
        }
    }
?>