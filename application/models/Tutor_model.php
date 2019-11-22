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
            $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $post = $this->input->post();
            $this->tutor_nip    = $post["tutor_nip"];
            $this->tutor_nama = $post["tutor_nama"];
            $this->tutor_agama= $post["tutor_agama"];
            $this->tutor_kewarganegaraan     = $post["tutor_kewarganegaraan"];
            $this->tutor_pendidikan_terakhir = $post["tutor_pendidikan_terakhir"];
            $this->tutor_alamat_jalan        = $post["tutor_alamat_jalan"];
            $this->tutor_alamat_rtrw         = $post["tutor_alamat_rtrw"];
            $this->tutor_alamat_desa         = $post["tutor_alamat_desa"];
            $this->tutor_alamat_kecamatan    = $post["tutor_alamat_kecamatan"];
            $this->tutor_alamat_kabupaten    = $post["tutor_alamat_kabupaten"];
            $this->tutor_alamat_provinsi     = $post["tutor_alamat_provinsi"];
            $this->tutor_alamat_kodepos      = $post["tutor_alamat_kodepos"];
            $this->tutor_foto                = $post["tutor_foto"];
            $this->db->update($this->_table, $this, array('tutor_id' => $post['tutor_id']));
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["tutor_id" => $id])->row_array();
        }
        public function delete_entry($id){
            $this->db->where('tutor_id',$id);
            return $this->db->delete('tutor');
        }
    }
?>