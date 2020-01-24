<?php

    Class Pimpinan_model extends CI_Model 
    {
        private $_table = "pimpinan";
        public $pimpinan_id;
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function rules()
        {
            return[
                [
                    'field' =>'pimpinan_nama',
                    'label' =>'Nama',
                    'rules' =>'required|trim|xss_clean'
                ],
                [
                    'field' =>'pimpinan_username',
                    'label' =>'Username',
                    'rules' =>'required|trim|callback_username_check_blank|xss_clean'
                ],
                [
                    'field' =>'pimpinan_password',
                    'label' =>'Password',
                    'rules' =>'required|min_length[7]'
                ]
            ];
        }
        public function rules_edit()
        {
            return[
                [
                    'field' =>'pimpinan_nama',
                    'label' =>'Nama',
                    'rules' =>'required|trim|xss_clean'
                ],
                [
                    'field' =>'pimpinan_username',
                    'label' =>'Username',
                    'rules' =>'required|trim|callback_username_check_blank|xss_clean'
                
                ]
            ];
        }
        private function _uploadImage()
        {
            $config['upload_path']          = './upload/images/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->pimpinan_id;
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('pimpinan_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }
        private function _deleteImage($id)
        {
            $pimpinan = $this->getById($id);
            if ($pimpinan["pimpinan_foto"] != "default.jpg") {
                $filename = explode(".", $pimpinan["pimpinan_foto"])[0];
                return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
            }
        }
        public function simpan(){
            $this->pimpinan_id = uniqid();
            $data= array(
                'pimpinan_id'                       => $this->pimpinan_id,
                'pimpinan_nama'                     => $this->input->post("pimpinan_nama"),
                'pimpinan_username'                 => $this->input->post("pimpinan_username"),
                'pimpinan_password'                 => md5(sha1($this->input->post("pimpinan_password"))),
                'pimpinan_foto'                     => $this->_uploadImage()
            );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui_password()
        {
            $this->pimpinan_id = $this->input->post("pimpinan_id");
            $password = md5(sha1($this->input->post("pimpinan_password")));
        
            return $this->db->query("UPDATE pimpinan SET pimpinan_password='$password' WHERE pimpinan_id='$this->pimpinan_id'");
        }
        public function perbarui()
        {
            $this->pimpinan_id = $this->input->post("pimpinan_id");
            if (!empty($_FILES["pimpinan_foto"]["name"])) {
                $foto = $this->_uploadImage();
            } else {
                $foto = $this->input->post("old_image");
            }
            $data= array(
                'pimpinan_nama'                     => $this->input->post("pimpinan_nama"),
                'pimpinan_username'                 => $this->input->post("pimpinan_username"),
                'pimpinan_foto'                     => $foto
            );
            $this->db->where('pimpinan_id',$this->pimpinan_id);
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["pimpinan_id" => $id])->row_array();
        }
        public function delete($id){
            $this->_deleteImage($id);
            return $this->db->delete($this->_table, array("pimpinan_id" => $id));
        }
        
    }
?>