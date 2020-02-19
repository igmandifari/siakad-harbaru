<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengaturan_model extends CI_model
	{
		public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function getAdmin($id){
        	$this->db->where('admin_id',$id);
        	return $this->db->get('admin')->row_array();
        }
        public function getTutor($id){
        	$this->db->where('tutor_id',$id);
        	return $this->db->get('tutor')->row_array();
        }
        public function getWargabelajar($id){
        	$this->db->where('wargabelajar_id',$id);
        	return $this->db->get('wargabelajar')->row_array();
        }
        public function updateAdmin($id)
        {
            if ($this->input->post("admin_foto")==0) {
                $foto = $this->_uploadImage();
            } else {
                $foto = $this->input->post("old_image");
            }
           

            $data= array(
                'admin_nama'        => $this->input->post("admin_nama"),
                'admin_username'    => strtolower($this->input->post("admin_username")),
                'admin_foto'        => $foto
            );

            $this->db->where('admin_id',$id);
            return $this->db->update("admin", $data);    
        }
        private function _uploadImage()
        {
            $config['upload_path']          = './upload/images/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->session->userdata('id');
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('admin_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }
	}