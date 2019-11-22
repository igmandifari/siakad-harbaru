<?php

    Class Tutor_model extends CI_Model 
    {
        private $_table = "tutor";
        public $tutor_nip;
        public function simpan(){
            $data= array(
                'tutor_id'                  => uniqid(),
                'tutor_nip'                 => $this->input->post("tutor_nip"),
                'tutor_nama'                => $this->input->post("tutor_nama"),
                'tutor_jenis_kelamin'       => $this->input->post("tutor_jenis_kelamin"),
                'tutor_tempat_lahir'        => $this->input->post("tutor_tempat_lahir"),
                'tutor_tanggal_lahir'       => $this->input->post("tutor_tanggal_lahir"),
                'tutor_agama'               => $this->input->post("tutor_agama"),
                'tutor_kewarganegaraan'     => $this->input->post("tutor_kewarganegaraan"),
                'tutor_pendidikan_terakhir' => $this->input->post("tutor_pendidikan_terakhir"),
                'tutor_alamat_jalan'        => $this->input->post("tutor_alamat_jalan"),
                'tutor_alamat_rtrw'         => $this->input->post("tutor_alamat_rtrw"),
                'tutor_alamat_desa'         => $this->input->post("tutor_alamat_desa"),
                'tutor_alamat_kecamatan'    => $this->input->post("tutor_alamat_kecamatan"),
                'tutor_alamat_kabupaten'    => $this->input->post("tutor_alamat_kabupaten"),
                'tutor_alamat_provinsi'     => $this->input->post("tutor_alamat_provinsi"),
                'tutor_alamat_kodepos'      => $this->input->post("tutor_alamat_kodepos"),
                'tutor_foto'                => $this->input->post("tutor_foto")
            );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $data= array(
                'tutor_nip'                 => $this->input->post("tutor_nip"),
                'tutor_nama'                => $this->input->post("tutor_nama"),
                'tutor_jenis_kelamin'       => $this->input->post("tutor_jenis_kelamin"),
                'tutor_tempat_lahir'        => $this->input->post("tutor_tempat_lahir"),
                'tutor_tanggal_lahir'       => $this->input->post("tutor_tanggal_lahir"),
                'tutor_agama'               => $this->input->post("tutor_agama"),
                'tutor_kewarganegaraan'     => $this->input->post("tutor_kewarganegaraan"),
                'tutor_pendidikan_terakhir' => $this->input->post("tutor_pendidikan_terakhir"),
                'tutor_alamat_jalan'        => $this->input->post("tutor_alamat_jalan"),
                'tutor_alamat_rtrw'         => $this->input->post("tutor_alamat_rtrw"),
                'tutor_alamat_desa'         => $this->input->post("tutor_alamat_desa"),
                'tutor_alamat_kecamatan'    => $this->input->post("tutor_alamat_kecamatan"),
                'tutor_alamat_kabupaten'    => $this->input->post("tutor_alamat_kabupaten"),
                'tutor_alamat_provinsi'     => $this->input->post("tutor_alamat_provinsi"),
                'tutor_alamat_kodepos'      => $this->input->post("tutor_alamat_kodepos"),
                'tutor_foto'                => $this->input->post("tutor_foto")
            );
            $this->db->where('tutor_id',$this->input->post("id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["tutor_id" => $id])->row_array();
        }
        public function delete($id){
            return $this->db->delete($this->_table, array("tutor_id" => $id));
        }
    }
?>