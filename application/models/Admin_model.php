<?php

    Class Admin_model extends CI_Model 
    {
        private $_table = "admin";
      
        public function simpan(){
            $data= array(
                'admin_id'                => uniqid(),
                'admin_nama'              => $this->input->post("admin_nama"),
                'username'                => $this->input->post("username"),
                'password'                => $this->input->post("password")
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'admin_nama'              => $this->input->post("admin_nama"),
                'username'                => $this->input->post("username"),
                'password'                => $this->input->post("password")
            );
            $this->db->where('admin_id',$this->input->post("admin_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["admin_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("admin_id" => $id));
        }
    }
?>