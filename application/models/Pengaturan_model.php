<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Pengaturan_model extends CI_model
	{
		public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function get_admin($id){
        	$this->db->where('admin_id',$id);
        	return $this->db->get('admin')->row_array();
        }
        public function updateAdmin($id)
        {
            if (!empty($_FILES["admin_foto"]["name"])) {
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
        public function get_tutor($id)
        {
            $this->db->where('tutor_id',$id);
            return $this->db->get('tutor')->row_array();
        }
        public function get_pass_tutor($id)
        {
            return $this->db->query("SELECT tutor.tutor_password as password FROM tutor WHERE tutor.tutor_id='$id'")->row_array();
        }
        public function update_pass_tutor($id,$data=array())
        {
            $this->db->where('tutor_id',$id);
            return $this->db->update('tutor',$data);
        }
        public function get_wb($id)
        {
            return $this->db->query("SELECT * FROM wargabelajar RIGHT JOIN tahunajaran ON tahunajaran.tahunajaran_id=wargabelajar.tahunajaran_id WHERE wargabelajar.wargabelajar_id='$id'")->row_array();
        }
        public function get_pass_wb($id)
        {
            return $this->db->query("SELECT wargabelajar.wargabelajar_password as password FROM wargabelajar WHERE wargabelajar.wargabelajar_id='$id'")->row_array();
        }
        public function update_pass_wb($id,$data=array())
        {
            $this->db->where('wargabelajar_id',$id);
            return $this->db->update('wargabelajar',$data);
        }
        public function get_pimpinan($id)
        {
            $this->db->where('pimpinan_id',$id);
            return $this->db->get('pimpinan')->row_array();
        }
        public function get_pass_pimpinan($id)
        {
            return $this->db->query("SELECT pimpinan.pimpinan_password as password FROM pimpinan WHERE pimpinan.pimpinan_id='$id'")->row_array();
        }
        public function update_pass_pimpinan($id,$data=array())
        {
            $this->db->where('pimpinan_id',$id);
            return $this->db->update('pimpinan',$data);
        }
	}