<?php

    Class Matpel_model extends CI_Model 
    {
        public $id;
        public $nama;
        
        private $_table = "matpel";
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
        public function rules()
        {
            return[
                [
                    'field' => 'matpel_nama',
                    'label' => 'Nama Mata Pelajaran',
                    'rules' => 'required|trim|xss_clean|is_unique[matpel.matpel_nama]',
                ]
            ];
        }

        public function simpan(){
            $data= array(
                'matpel_id'                  => uniqid(),
                'matpel_nama'                => $this->input->post("matpel_nama"),
                'created_at'                 => date('Y-m-d H:i:s')
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'matpel_nama'                => $this->input->post("matpel_nama"),
                'updated_at'                 => date('Y-m-d H:i:s')
            );
            $this->db->where('matpel_id',$this->input->post("matpel_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->query("SELECT * FROM matpel ORDER BY matpel.matpel_nama ASC")->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["matpel_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("matpel_id" => $id));
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