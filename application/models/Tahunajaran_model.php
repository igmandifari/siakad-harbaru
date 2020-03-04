<?php

    Class Tahunajaran_model extends CI_Model 
    {
        private $_table = "tahunajaran";
        public $id;
        public $nama;
        
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }
      
        public function rules()
        {
            return[
                [
                    'field' => 'tahunajaran_nama',
                    'label' => 'Nama Tahun Ajaran',
                    'rules' => 'required|trim|xss_clean|is_unique[tahunajaran.tahunajaran_nama]',
                ]
            ];
        }
        public function simpan_rombel($data=array()){
            return $this->db->insert('rombel',$data);
        }
        public function simpan($data=array()){
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'tahunajaran_nama'              => $this->input->post("tahunajaran_nama"),
                'updated_at'                    => date('Y-m-d H:i:s')
            );
            $this->db->where('tahunajaran_id',$this->input->post("tahunajaran_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            $this->db->order_by('tahunajaran_nama desc');
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["tahunajaran_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("tahunajaran_id" => $id));
        }
        public function getKelas(){
            return $this->db->get('kelas')->result();
        }
    }
?>