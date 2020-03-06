<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Admin_model extends CI_Model 
    {

        private $_table = "admin";
        public $admin_id;

        public function rules(){
            return[
                [
                    'field' =>'admin_nama',
                    'label' =>'Nama',
                    'rules' =>'required|trim|xss_clean'
                ],
                [
                    'field' =>'admin_username',
                    'label' =>'Username',
                    'rules' =>'required|trim|callback_username_check_blank|xss_clean'
                ],
                [
                    'field' =>'admin_password',
                    'label' =>'Password',
                    'rules' =>'required|min_length[7]'
                ]
            ];
        }
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function simpan()
        {
           $this->admin_id = uniqid();
            $data= array(
                'admin_id'          => $this->admin_id,
                'admin_nama'        => $this->input->post("admin_nama"),
                'admin_username'    => strtolower($this->input->post("admin_username")),
                'admin_password'    => MD5(SHA1($this->input->post("admin_password"))),
                'admin_foto'        => $this->_uploadImage()
                );

            return $this->db->insert($this->_table, $data);    
        }

        private function _uploadImage()
        {
            $config['upload_path']          = './upload/images/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->admin_id;
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('admin_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }

        private function _deleteImage($id)
        {
            $admin = $this->getById($id);
            if ($admin["admin_foto"] != "default.jpg") {
                $filename = explode(".", $admin["admin_foto"])[0];
                return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
            }
        }
        
        public function perbarui_password($id=null)
        {
            if($id ==null){
                $id = $this->input->post("admin_id");
            }
            $password = MD5(SHA1($this->input->post("admin_password")));
        
            return $this->db->query("UPDATE admin SET admin_password='$password' WHERE admin_id='$id'");
        }

        public function perbarui()
        {
            $this->admin_id = $this->input->post("admin_id");

            // check, if admin have foto or not
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
            $this->_deleteImage($id);
        }
        public function logs()
        {
            $this->load->library('user_agent');
            $data = array(
                'users'     => $this->session->userdata('id'),
                'level'     => $this->session->userdata('level'),
                'name'      => $this->session->userdata('nama'),
                'url'       => $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4),
                'ip'        =>$this->input->ip_address(),
                'times'     => date('Y-m-d H:i:s'),
                'browser'   => $this->agent->browser().' '.$this->agent->version(),
                'os'        => $this->agent->platform()
            );
            return $this->db->insert('logs',$data);
        }
    }
?>