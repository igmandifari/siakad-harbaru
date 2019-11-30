<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Siswa_model extends CI_Model 
    {
        private $_table = "siswa";
        public $siswa_id;

        public function rules(){
            return[
                ['field'    => 'siswa_nis',
                 'label'    => 'NIS',
                 'rules'    => 'required|numeric'],
                 ['field'    => 'siswa_nama',
                 'label'    => 'NAMA',
                 'rules'    => 'required']
            ];
        }

        private function _uploadImage()
        {
            $config['upload_path']          = './upload/siswa/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->siswa_id;
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('siswa_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }
        private function _deleteImage($id)
        {
            $siswa = $this->getById($id);
            if ($siswa->siswa_foto != "default.jpg") {
                $filename = explode(".", $siswa->siswa_foto)[0];
                return array_map('unlink', glob(FCPATH."upload/siswa/$filename.*"));
            }
        }
        public function simpan(){
            $this->siswa_id = uniqid();
            $data= array(
                'siswa_id'                  => $this->siswa_id,
                'siswa_nis'                 => $this->input->post("siswa_nis"),
                'siswa_nisn'                => $this->input->post("siswa_nisn"),
                'siswa_nik'                 => $this->input->post("siswa_nik"),
                'siswa_nama'                => $this->input->post("siswa_nama"),
                'siswa_jenis_kelamin'       => $this->input->post("siswa_jenis_kelamin"),
                'siswa_tempat_lahir'        => $this->input->post("siswa_tempat_lahir"),
                'siswa_tanggal_lahir'       => $this->input->post("siswa_tanggal_lahir"),
                'siswa_agama'               => $this->input->post("siswa_agama"),
                'siswa_kewarganegaraan'     => $this->input->post("siswa_kewarganegaraan"), 
                'siswa_alamat_jalan'        => $this->input->post("siswa_alamat_jalan"),
                'siswa_alamat_rtrw'         => $this->input->post("siswa_alamat_rtrw"),
                'siswa_alamat_desa'         => $this->input->post("siswa_alamat_desa"),
                'siswa_alamat_kecamatan'    => $this->input->post("siswa_alamat_kecamatan"),
                'siswa_alamat_kabupaten'    => $this->input->post("siswa_alamat_kabupaten"),
                'siswa_alamat_provinsi'     => $this->input->post("siswa_alamat_provinsi"),
                'siswa_alamat_kodepos'      => $this->input->post("siswa_alamat_kodepos"),
                'siswa_foto'                => $this->_uploadImage(),
                'siswa_password'            => $this->input->post("siswa_nis"),
                'kelas_id'                  => $this->input->post("kelas_id"),

                'orangtua_ayah_nama'            => $this->input->post("orangtua_ayah_nama"),
                'orangtua_ayah_nik'             => $this->input->post("orangtua_ayah_nik"),
                'orangtua_ayah_agama'           => $this->input->post("orangtua_ayah_agama"),
                'orangtua_ayah_kewarganegaraan'  => $this->input->post("orangtua_ayah_kewarganegaraan"),
                'orangtua_ayah_pendidikan_terakhir'  => $this->input->post("orangtua_ayah_pendidikan_terakhir"),
                'orangtua_ayah_pekerjaan'  => $this->input->post("orangtua_ayah_pekerjaan"),
                'orangtua_ayah_alamat_jalan'        => $this->input->post("orangtua_ayah_alamat_jalan"),
                'orangtua_ayah_alamat_rtrw'         => $this->input->post("orangtua_ayah_alamat_rtrw"),
                'orangtua_ayah_alamat_desa'         => $this->input->post("orangtua_ayah_alamat_desa"),
                'orangtua_ayah_alamat_kecamatan'    => $this->input->post("orangtua_ayah_alamat_kecamatan"),
                'orangtua_ayah_alamat_kabupaten'    => $this->input->post("orangtua_ayah_alamat_kabupaten"),
                'orangtua_ayah_alamat_provinsi'     => $this->input->post("orangtua_ayah_alamat_provinsi"),
                'orangtua_ayah_alamat_kodepos'      => $this->input->post("orangtua_ayah_alamat_kodepos"),

                'orangtua_ibu_nama'                 => $this->input->post("orangtua_ibu_nama"),
                'orangtua_ibu_nik'                  => $this->input->post("orangtua_ibu_nik"),
                'orangtua_ibu_agama'                => $this->input->post("orangtua_ibu_agama"),
                'orangtua_ibu_kewarganegaraan'      => $this->input->post("orangtua_ibu_kewarganegaraan"),
                'orangtua_ibu_pendidikan_terakhir'  => $this->input->post("orangtua_ibu_pendidikan_terakhir"),
                'orangtua_ibu_pekerjaan'            => $this->input->post("orangtua_ibu_pekerjaan"),
                'orangtua_ibu_alamat_jalan'         => $this->input->post("orangtua_ibu_alamat_jalan"),
                'orangtua_ibu_alamat_rtrw'          => $this->input->post("orangtua_ibu_alamat_rtrw"),
                'orangtua_ibu_alamat_desa'          => $this->input->post("orangtua_ibu_alamat_desa"),
                'orangtua_ibu_alamat_kecamatan'     => $this->input->post("orangtua_ibu_alamat_kecamatan"),
                'orangtua_ibu_alamat_kabupaten'     => $this->input->post("orangtua_ibu_alamat_kabupaten"),
                'orangtua_ibu_alamat_provinsi'      => $this->input->post("orangtua_ibu_alamat_provinsi"),
                'orangtua_ibu_alamat_kodepos'       => $this->input->post("orangtua_ibu_alamat_kodepos"),

                'orangtua_wali_nama'                => $this->input->post("orangtua_wali_nama"),
                'orangtua_wali_nik'                 => $this->input->post("orangtua_wali_nik"),
                'orangtua_wali_agama'               => $this->input->post("orangtua_wali_agama"),
                'orangtua_wali_kewarganegaraan'     => $this->input->post("orangtua_wali_kewarganegaraan"),
                'orangtua_wali_pendidikan_terakhir' => $this->input->post("orangtua_wali_pendidikan_terakhir"),
                'orangtua_wali_pekerjaan'           => $this->input->post("orangtua_wali_pekerjaan"),
                'orangtua_wali_alamat_jalan'        => $this->input->post("orangtua_wali_alamat_jalan"),
                'orangtua_wali_alamat_rtrw'         => $this->input->post("orangtua_wali_alamat_rtrw"),
                'orangtua_wali_alamat_desa'         => $this->input->post("orangtua_wali_alamat_desa"),
                'orangtua_wali_alamat_kecamatan'    => $this->input->post("orangtua_wali_alamat_kecamatan"),
                'orangtua_wali_alamat_kabupaten'    => $this->input->post("orangtua_wali_alamat_kabupaten"),
                'orangtua_wali_alamat_provinsi'     => $this->input->post("orangtua_wali_alamat_provinsi"),
                'orangtua_wali_alamat_kodepos'      => $this->input->post("orangtua_wali_alamat_kodepos")

            );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui()
        {
            $this->siswa_id = $this->input->post("id");
            if (!empty($_FILES["siswa_foto"]["name"])) {
                $foto = $this->_uploadImage();
            } else {
                $foto = $this->input->post("old_image");
            }
            $data= array(
                'siswa_nis'                 => $this->input->post("siswa_nis"),
                'siswa_nisn'                => $this->input->post("siswa_nisn"),
                'siswa_nama'                => $this->input->post("siswa_nama"),
                'siswa_nik'                 => $this->input->post("siswa_nik"),
                'siswa_jenis_kelamin'       => $this->input->post("siswa_jenis_kelamin"),
                'siswa_tempat_lahir'        => $this->input->post("siswa_tempat_lahir"),
                'siswa_tanggal_lahir'       => $this->input->post("siswa_tanggal_lahir"),
                'siswa_agama'               => $this->input->post("siswa_agama"),
                'siswa_kewarganegaraan'     => $this->input->post("siswa_kewarganegaraan"), 
                'siswa_alamat_jalan'        => $this->input->post("siswa_alamat_jalan"),
                'siswa_alamat_rtrw'         => $this->input->post("siswa_alamat_rtrw"),
                'siswa_alamat_desa'         => $this->input->post("siswa_alamat_desa"),
                'siswa_alamat_kecamatan'    => $this->input->post("siswa_alamat_kecamatan"),
                'siswa_alamat_kabupaten'    => $this->input->post("siswa_alamat_kabupaten"),
                'siswa_alamat_provinsi'     => $this->input->post("siswa_alamat_provinsi"),
                'siswa_alamat_kodepos'      => $this->input->post("siswa_alamat_kodepos"),
                'siswa_foto'                => $foto,

                'orangtua_ayah_nik'                 => $this->input->post("orangtua_ayah_nik"),
                'orangtua_ayah_nama'         => $this->input->post("orangtua_ayah_nama"),
                'orangtua_ayah_agama'        => $this->input->post("orangtua_ayah_agama"),
                'orangtua_ayah_kewarganegaraan'  => $this->input->post("orangtua_ayah_kewarganegaraan"),
                'orangtua_ayah_pendidikan_terakhir'  => $this->input->post("orangtua_ayah_pendidikan_terakhir"),
                'orangtua_ayah_pekerjaan'  => $this->input->post("orangtua_ayah_pekerjaan"),
                'orangtua_ayah_alamat_jalan'        => $this->input->post("orangtua_ayah_alamat_jalan"),
                'orangtua_ayah_alamat_rtrw'         => $this->input->post("orangtua_ayah_alamat_rtrw"),
                'orangtua_ayah_alamat_desa'         => $this->input->post("orangtua_ayah_alamat_desa"),
                'orangtua_ayah_alamat_kecamatan'    => $this->input->post("orangtua_ayah_alamat_kecamatan"),
                'orangtua_ayah_alamat_kabupaten'    => $this->input->post("orangtua_ayah_alamat_kabupaten"),
                'orangtua_ayah_alamat_provinsi'     => $this->input->post("orangtua_ayah_alamat_provinsi"),
                'orangtua_ayah_alamat_kodepos'      => $this->input->post("orangtua_ayah_alamat_kodepos"),

                'orangtua_ibu_nik'                 => $this->input->post("orangtua_ibu_nik"),
                'orangtua_ibu_nama'         => $this->input->post("orangtua_ibu_nama"),
                'orangtua_ibu_agama'        => $this->input->post("orangtua_ibu_agama"),
                'orangtua_ibu_kewarganegaraan'  => $this->input->post("orangtua_ibu_kewarganegaraan"),
                'orangtua_ibu_pendidikan_terakhir'  => $this->input->post("orangtua_ibu_pendidikan_terakhir"),
                'orangtua_ibu_pekerjaan'  => $this->input->post("orangtua_ibu_pekerjaan"),
                'orangtua_ibu_alamat_jalan'        => $this->input->post("orangtua_ibu_alamat_jalan"),
                'orangtua_ibu_alamat_rtrw'         => $this->input->post("orangtua_ibu_alamat_rtrw"),
                'orangtua_ibu_alamat_desa'         => $this->input->post("orangtua_ibu_alamat_desa"),
                'orangtua_ibu_alamat_kecamatan'    => $this->input->post("orangtua_ibu_alamat_kecamatan"),
                'orangtua_ibu_alamat_kabupaten'    => $this->input->post("orangtua_ibu_alamat_kabupaten"),
                'orangtua_ibu_alamat_provinsi'     => $this->input->post("orangtua_ibu_alamat_provinsi"),
                'orangtua_ibu_alamat_kodepos'      => $this->input->post("orangtua_ibu_alamat_kodepos"),

                'orangtua_wali_nik'                 => $this->input->post("orangtua_wali_nik"),
                'orangtua_wali_nama'         => $this->input->post("orangtua_wali_nama"),
                'orangtua_wali_agama'        => $this->input->post("orangtua_wali_agama"),
                'orangtua_wali_kewarganegaraan'  => $this->input->post("orangtua_wali_kewarganegaraan"),
                'orangtua_wali_pendidikan_terakhir'  => $this->input->post("orangtua_wali_pendidikan_terakhir"),
                'orangtua_wali_pekerjaan'  => $this->input->post("orangtua_wali_pekerjaan"),
                'orangtua_wali_alamat_jalan'        => $this->input->post("orangtua_wali_alamat_jalan"),
                'orangtua_wali_alamat_rtrw'         => $this->input->post("orangtua_wali_alamat_rtrw"),
                'orangtua_wali_alamat_desa'         => $this->input->post("orangtua_wali_alamat_desa"),
                'orangtua_wali_alamat_kecamatan'    => $this->input->post("orangtua_wali_alamat_kecamatan"),
                'orangtua_wali_alamat_kabupaten'    => $this->input->post("orangtua_wali_alamat_kabupaten"),
                'orangtua_wali_alamat_provinsi'     => $this->input->post("orangtua_wali_alamat_provinsi"),
                'orangtua_wali_alamat_kodepos'      => $this->input->post("orangtua_wali_alamat_kodepos")
            );
            $this->db->where('siswa_id',$this->input->post("id"));
            return $this->db->update($this->_table, $data);    
            
           
             
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["siswa_id" => $id])->row();
        }
        public function delete($id){
            $this->_deleteImage($id);
            return $this->db->delete($this->_table, array("siswa_id" => $id));
        }
    }
?>