<?php

    Class Admin_model extends CI_Model 
    {
        private $_table = "admin";
      
        public function simpan()
        {
           
            $data= array(
                'admin_id'          => uniqid(),
                'admin_nama'        => $this->input->post("admin_nama"),
                'admin_username'    => strtolower($this->input->post("admin_username")),
                'admin_password'    => MD5($this->input->post("admin_password"))
                );

            if ( ! $this->db->insert($this->_table, $data))
            {
                return $this->db->error(); // Has keys 'code' and 'message'
            }
            
        }
        public function perbarui()
        {
            $data= array(
                'admin_nama'        => $this->input->post("admin_nama"),
                'admin_username'    => $this->input->post("admin_username"),
                'admin_password'    => MD5($this->input->post("admin_password"))
            );
            $this->db->where('admin_id',$this->input->post("admin_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function perbaruiWithoutPassword()
        {
            $data= array(
                'admin_nama'        => $this->input->post("admin_nama"),
                'admin_username'    => strtolower($this->input->post("admin_username"))
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