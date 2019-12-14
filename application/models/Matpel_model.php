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
                ],
                [
                    'field' => 'tipe_pembelajaran',
                    'label' => 'Jenis Pembelajaran',
                    'rules' => 'required|trim|xss_clean|callback_select_validate',
                ],
                [
                    'field' => 'tutor_id',
                    'label' => 'Tutor',
                    'rules' => 'required|callback_select_validate|xss_clean',
                ]
            ];
        }

        public function simpan(){
            $data= array(
                'matpel_id'                  => uniqid(),
                'matpel_nama'                => $this->input->post("matpel_nama"),
                'tutor_id'                   => $this->input->post("tutor_id"),
                'tipe_pembelajaran'          => $this->input->post("tipe_pembelajaran"),
                'created_at'                 => CURRENT_TIMESTAMP
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'matpel_nama'                => $this->input->post("matpel_nama"),
                'tutor_id'                   => $this->input->post("tutor_id"),
                'tipe_pembelajaran'          => $this->input->post("tipe_pembelajaran"),
                'updated_at'                 => CURRENT_TIMESTAMP
            );
            $this->db->where('matpel_id',$this->input->post("matpel_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->query("SELECT * FROM matpel INNER JOIN tutor on tutor.tutor_id=matpel.tutor_id")->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["matpel_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("matpel_id" => $id));
        }
        public function getTutor(){
            return $this->db->get("tutor")->result();
        }
    }
?>