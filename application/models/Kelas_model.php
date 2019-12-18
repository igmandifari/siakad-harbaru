<?php

    Class Kelas_model extends CI_Model 
    {
        private $_table = "kelas";

        public function rules()
        {
            return[
                [
                    'field' => 'kelas_nama',
                    'label' => 'Nama Kelas',
                    'rules' => 'required|trim|xss_clean|is_unique[kelas.kelas_nama]',
                ]
            ];
        }
        public function rules_rombel()
        {
            return[
                [
                    'field' => 'kelas_id',
                    'label' => 'Kelas',
                    'rules' => 'required|trim|xss_clean|callback_select_validate',
                ],
                [
                    'field' => 'tahunajaran_id',
                    'label' => 'Tahun Ajaran',
                    'rules' => 'required|trim|xss_clean|callback_select_validate',
                ]
            ];
        }
        public function simpan(){
            $data= array(
                'kelas_id'                  => uniqid(),
                'kelas_nama'                => $this->input->post("kelas_nama"),
                'created_at'                => date('Y-m-d H:i:s')
                );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'kelas_nama'                => $this->input->post("kelas_nama"),
                'updated_at'                => date('Y-m-d H:i:s')
            );
            $this->db->where('kelas_id',$this->input->post("kelas_id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["kelas_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("kelas_id" => $id));
        }
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result();
        }
        public function getWargaBelajar(){
            return $this->db->get('wargabelajar')->result();
        }
        public function rombel_save(){
            $data = array(
                'kelas_id'              => $this->input->post("kelas_id"),
                'tahunajaran_id'        => $this->input->post("tahunajaran_id"),
                'wargabelajar_id'        => $this->input->post("wargabelajar_id"),
                'created_at'                => date('Y-m-d H:i:s')
            );
            return $this->db->insert("kelas_details",$data);
        }

        public function getRombel()
        {
            return $this->db->query('SELECT rombel.rombel_id, kelas.kelas_nama, tahunajaran.tahunajaran_nama FROM rombel inner join kelas on kelas.kelas_id = rombel.kelas_id INNER join tahunajaran on tahunajaran.tahunajaran_id = rombel.tahunajaran_id')->result();
        }
        public function getRombelbyId($id){
            return $this->db->query("select kelas.kelas_id,kelas.kelas_nama, tahunajaran.tahunajaran_id, tahunajaran.tahunajaran_nama,rombel_id from rombel inner join kelas on kelas.kelas_id=rombel.kelas_id INNER join tahunajaran on tahunajaran.tahunajaran_id=rombel.tahunajaran_id where rombel_id = '$id' ")->row_array();
        }
        public function getWargaBelajarNonRombel(){
            return $this->db->query("SELECT wargabelajar.wargabelajar_nama, wargabelajar.wargabelajar_id,wargabelajar.wargabelajar_nisn, wargabelajar.wargabelajar_nomor_induk from wargabelajar")->result();
        }
       public function rombelsave(){
           $data = array(
               'rombel_id'          => $this->input->post('rombel_id'),
               'wargabelajar_id'    => $this->input->post('wargabelajar_id')
           );
           return $this->db->insert('rombel_details',$data);
       }
       public function getRombelDetbyId($id){
           return $this->db->query("SELECT tahunajaran.tahunajaran_nama, kelas.kelas_nama, wargabelajar.wargabelajar_nama, wargabelajar.wargabelajar_id,wargabelajar.wargabelajar_nisn, wargabelajar.wargabelajar_nomor_induk, rombel_details.rombel_id, rombel_details.rombel_details_id from wargabelajar left join rombel_details on rombel_details.wargabelajar_id = wargabelajar.wargabelajar_id left join rombel on rombel.rombel_id='$id' LEFT JOIN kelas on kelas.kelas_id = rombel.kelas_id  LEFT JOIN tahunajaran on tahunajaran.tahunajaran_id=rombel.tahunajaran_id WHERE rombel_details.rombel_id='$id'")->result();
       }
       public function rombelDet($id){
        return $this->db->delete(rombel_details, array("rombel_details_id" => $id));
    }
}
    