<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Wargabelajar_model extends CI_Model 
    {
        private $_table = "wargabelajar";
        public $wargabelajar_id;

        public function rules_ortu()
        {
            return[
                ['field'    => 'orangtua_ayah_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ibu_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_pekerjaan',
                'label'    => 'Pekerjaan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_jalan',
                'label'    => 'Alamat',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_rtrw',
                'label'    => 'RT/RW',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_desa',
                'label'    => 'Desa/Kelurahan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kecamatan',
                'label'    => 'Kecamatan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kabupaten',
                'label'    => 'Kota/Kabupaten',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_provinsi',
                'label'    => 'Provinsi',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kodepos',
                'label'    => 'Kode POS',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_pekerjaan',
                'label'    => 'Pekerjaan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_jalan',
                'label'    => 'Alamat',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_rtrw',
                'label'    => 'RT/RW',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_desa',
                'label'    => 'Desa/Kelurahan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kecamatan',
                'label'    => 'Kecamatan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kabupaten',
                'label'    => 'Kota/Kabupaten',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_provinsi',
                'label'    => 'Provinsi',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kodepos',
                'label'    => 'Kode POS',
                'rules'    => 'trim|xss_clean']

            ];
        }
        public function rules(){
            return[
                ['field'    => 'wargabelajar_nomor_induk',
                 'label'    => 'Nomor Induk',
                 'rules'    => 'required|trim|numeric|xss_clean'],
                 ['field'    => 'wargabelajar_nisn',
                 'label'    => 'NISN',
                 'rules'    => 'trim|numeric|xss_clean'],
                 ['field'    => 'wargabelajar_nama',
                 'label'    => 'Nama',
                 'rules'    => 'required|trim|xss_clean'],
                 ['field'    => 'wargabelajar_nik',
                 'label'    => 'NIK',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_jenis_kelamin',
                 'label'    => 'Jenis Kelamin',
                 'rules'    => 'required|xss_clean'],
                 ['field'    => 'wargabelajar_tempat_lahir',
                 'label'    => 'Tempat Lahir',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_agama',
                 'label'    => 'Agama',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_kewarganegaraan',
                 'label'    => 'Kewarganegaraan',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_jalan',
                 'label'    => 'Alamat',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_rtrw',
                 'label'    => 'RT/RW',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_desa',
                 'label'    => 'Desa/Kelurahan',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_kecamatan',
                 'label'    => 'Kecamatan',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_kabupaten',
                 'label'    => 'Kota/Kabupaten',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_provinsi',
                 'label'    => 'Provinsi',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_alamat_kodepos',
                 'label'    => 'Kode POS',
                 'rules'    => 'trim|xss_clean'],
                 ['field'   => 'wargabelajar_kejar',
                 'label'    => 'Nama Sekolah/Kejar',
                 'rules'    => 'trim|xss_clean',
                ],
                ['field'   => 'tahunajaran_id',
                 'label'    => 'Tahun Ajaran Masuk',
                 'rules'    => 'required|trim|xss_clean',
                ],
                 ['field'   => 'wargabelajar_kejar_alamat',
                 'label'    => 'Alamat Sekolah/Kejar',
                 'rules'    => 'trim|xss_clean',
                ],
                 ['field'   => 'wargabelajar_sttb',
                 'label'    => 'Nomor STTB/STSB',
                 'rules'    => 'trim|xss_clean',
                ],
                ['field'    => 'orangtua_ayah_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ibu_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_pekerjaan',
                'label'    => 'Pekerjaan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_jalan',
                'label'    => 'Alamat',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_rtrw',
                'label'    => 'RT/RW',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_desa',
                'label'    => 'Desa/Kelurahan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kecamatan',
                'label'    => 'Kecamatan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kabupaten',
                'label'    => 'Kota/Kabupaten',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_provinsi',
                'label'    => 'Provinsi',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_ayah_alamat_kodepos',
                'label'    => 'Kode POS',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_nama',
                'label'    => 'Nama',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_pekerjaan',
                'label'    => 'Pekerjaan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_jalan',
                'label'    => 'Alamat',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_rtrw',
                'label'    => 'RT/RW',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_desa',
                'label'    => 'Desa/Kelurahan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kecamatan',
                'label'    => 'Kecamatan',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kabupaten',
                'label'    => 'Kota/Kabupaten',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_provinsi',
                'label'    => 'Provinsi',
                'rules'    => 'trim|xss_clean'],
                ['field'    => 'orangtua_wali_alamat_kodepos',
                'label'    => 'Kode POS',
                'rules'    => 'trim|xss_clean']
            ];
        }

        private function _uploadImage()
        {
            $config['upload_path']          = './upload/images/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->wargabelajar_id;
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('wargabelajar_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }
        private function _deleteImage($id)
        {
            $wargabelajar = $this->getById($id);
            if ($wargabelajar->wargabelajar_foto != "default.jpg") {
                $filename = explode(".", $wargabelajar->wargabelajar_foto)[0];
                return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
            }
        }
        public function simpan(){
            $this->wargabelajar_id = uniqid();
            $data= array(
                'wargabelajar_id'                  => $this->wargabelajar_id,
                'wargabelajar_nomor_induk'         => $this->input->post("wargabelajar_nomor_induk"),
                'wargabelajar_nisn'                => $this->input->post("wargabelajar_nisn"),
                'wargabelajar_nik'                 => $this->input->post("wargabelajar_nik"),
                'wargabelajar_nama'                => $this->input->post("wargabelajar_nama"),
                'wargabelajar_jenis_kelamin'       => $this->input->post("wargabelajar_jenis_kelamin"),
                'wargabelajar_tempat_lahir'        => $this->input->post("wargabelajar_tempat_lahir"),
                'wargabelajar_tanggal_lahir'       => $this->input->post("wargabelajar_tanggal_lahir"),
                'wargabelajar_agama'               => $this->input->post("wargabelajar_agama"),
                'wargabelajar_kewarganegaraan'     => $this->input->post("wargabelajar_kewarganegaraan"), 
                'wargabelajar_alamat_jalan'        => $this->input->post("wargabelajar_alamat_jalan"),
                'wargabelajar_alamat_rtrw'         => $this->input->post("wargabelajar_alamat_rtrw"),
                'wargabelajar_alamat_desa'         => $this->input->post("wargabelajar_alamat_desa"),
                'wargabelajar_alamat_kecamatan'    => $this->input->post("wargabelajar_alamat_kecamatan"),
                'wargabelajar_alamat_kabupaten'    => $this->input->post("wargabelajar_alamat_kabupaten"),
                'wargabelajar_alamat_provinsi'     => $this->input->post("wargabelajar_alamat_provinsi"),
                'wargabelajar_alamat_kodepos'      => $this->input->post("wargabelajar_alamat_kodepos"),
                'wargabelajar_kejar'               => $this->input->post("wargabelajar_kejar"),
                'wargabelajar_kejar_alamat'        => $this->input->post("wargabelajar_kejar_alamat"),
                'wargabelajar_sttb'                => $this->input->post("wargabelajar_sttb"),
                'wargabelajar_masuk'               => $this->input->post("wargabelajar_masuk"),
                'wargabelajar_foto'                => $this->_uploadImage(),
                'wargabelajar_password'            => md5(sha1($this->input->post("wargabelajar_nomor_induk"))),
                'tahunajaran_id'                   => $this->input->post("tahunajaran_id"),

                'orangtua_ayah_nama'               => $this->input->post("orangtua_ayah_nama"),
                'orangtua_ibu_nama'                =>$this->input->post("orangtua_ibu_nama"),
                'orangtua_ayah_pekerjaan'          => $this->input->post("orangtua_ayah_pekerjaan"),
                'orangtua_ayah_alamat_jalan'       => $this->input->post("orangtua_ayah_alamat_jalan"),
                'orangtua_ayah_alamat_rtrw'        => $this->input->post("orangtua_ayah_alamat_rtrw"),
                'orangtua_ayah_alamat_desa'        => $this->input->post("orangtua_ayah_alamat_desa"),
                'orangtua_ayah_alamat_kecamatan'   => $this->input->post("orangtua_ayah_alamat_kecamatan"),
                'orangtua_ayah_alamat_kabupaten'   => $this->input->post("orangtua_ayah_alamat_kabupaten"),
                'orangtua_ayah_alamat_provinsi'    => $this->input->post("orangtua_ayah_alamat_provinsi"),
                'orangtua_ayah_alamat_kodepos'     => $this->input->post("orangtua_ayah_alamat_kodepos"),

                'orangtua_wali_nama'               => $this->input->post("orangtua_wali_nama"),
                'orangtua_wali_pekerjaan'          => $this->input->post("orangtua_wali_pekerjaan"),
                'orangtua_wali_alamat_jalan'       => $this->input->post("orangtua_wali_alamat_jalan"),
                'orangtua_wali_alamat_rtrw'        => $this->input->post("orangtua_wali_alamat_rtrw"),
                'orangtua_wali_alamat_desa'        => $this->input->post("orangtua_wali_alamat_desa"),
                'orangtua_wali_alamat_kecamatan'   => $this->input->post("orangtua_wali_alamat_kecamatan"),
                'orangtua_wali_alamat_kabupaten'   => $this->input->post("orangtua_wali_alamat_kabupaten"),
                'orangtua_wali_alamat_provinsi'    => $this->input->post("orangtua_wali_alamat_provinsi"),
                'orangtua_wali_alamat_kodepos'     => $this->input->post("orangtua_wali_alamat_kodepos")

            );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui_password()
        {
            $this->wargabelajar_id = $this->input->post("id");
            $password = MD5(SHA1($this->input->post("wargabelajar_password")));
        
            return $this->db->query("UPDATE wargabelajar SET wargabelajar_password='$password' WHERE wargabelajar_id='$this->wargabelajar_id'");
        }
        public function perbarui_ortu()
        {
            $data = array(
                'orangtua_ayah_nama'               => $this->input->post("orangtua_ayah_nama"),
                'orangtua_ibu_nama'                =>$this->input->post("orangtua_ibu_nama"),
                'orangtua_ayah_pekerjaan'          => $this->input->post("orangtua_ayah_pekerjaan"),
                'orangtua_ayah_alamat_jalan'       => $this->input->post("orangtua_ayah_alamat_jalan"),
                'orangtua_ayah_alamat_rtrw'        => $this->input->post("orangtua_ayah_alamat_rtrw"),
                'orangtua_ayah_alamat_desa'        => $this->input->post("orangtua_ayah_alamat_desa"),
                'orangtua_ayah_alamat_kecamatan'   => $this->input->post("orangtua_ayah_alamat_kecamatan"),
                'orangtua_ayah_alamat_kabupaten'   => $this->input->post("orangtua_ayah_alamat_kabupaten"),
                'orangtua_ayah_alamat_provinsi'    => $this->input->post("orangtua_ayah_alamat_provinsi"),
                'orangtua_ayah_alamat_kodepos'     => $this->input->post("orangtua_ayah_alamat_kodepos"),

                'orangtua_wali_nama'               => $this->input->post("orangtua_wali_nama"),
                'orangtua_wali_pekerjaan'          => $this->input->post("orangtua_wali_pekerjaan"),
                'orangtua_wali_alamat_jalan'       => $this->input->post("orangtua_wali_alamat_jalan"),
                'orangtua_wali_alamat_rtrw'        => $this->input->post("orangtua_wali_alamat_rtrw"),
                'orangtua_wali_alamat_desa'        => $this->input->post("orangtua_wali_alamat_desa"),
                'orangtua_wali_alamat_kecamatan'   => $this->input->post("orangtua_wali_alamat_kecamatan"),
                'orangtua_wali_alamat_kabupaten'   => $this->input->post("orangtua_wali_alamat_kabupaten"),
                'orangtua_wali_alamat_provinsi'    => $this->input->post("orangtua_wali_alamat_provinsi"),
                'orangtua_wali_alamat_kodepos'     => $this->input->post("orangtua_wali_alamat_kodepos")
            );
            $this->db->where('wargabelajar_id',$this->input->post("id"));
            return $this->db->update($this->_table, $data);
        }
        public function perbarui()
        {
            $this->wargabelajar_id = $this->input->post("id");
            if (!empty($_FILES["wargabelajar_foto"]["name"])) {
                $foto = $this->_uploadImage();
            } else {
                $foto = $this->input->post("old_image");
            }
            $data= array(
                'wargabelajar_nomor_induk'         => $this->input->post("wargabelajar_nomor_induk"),
                'wargabelajar_nisn'                => $this->input->post("wargabelajar_nisn"),
                'wargabelajar_nik'                 => $this->input->post("wargabelajar_nik"),
                'wargabelajar_nama'                => $this->input->post("wargabelajar_nama"),
                'wargabelajar_jenis_kelamin'       => $this->input->post("wargabelajar_jenis_kelamin"),
                'wargabelajar_tempat_lahir'        => $this->input->post("wargabelajar_tempat_lahir"),
                'wargabelajar_tanggal_lahir'       => $this->input->post("wargabelajar_tanggal_lahir"),
                'wargabelajar_agama'               => $this->input->post("wargabelajar_agama"),
                'wargabelajar_kewarganegaraan'     => $this->input->post("wargabelajar_kewarganegaraan"), 
                'wargabelajar_alamat_jalan'        => $this->input->post("wargabelajar_alamat_jalan"),
                'wargabelajar_alamat_rtrw'         => $this->input->post("wargabelajar_alamat_rtrw"),
                'wargabelajar_alamat_desa'         => $this->input->post("wargabelajar_alamat_desa"),
                'wargabelajar_alamat_kecamatan'    => $this->input->post("wargabelajar_alamat_kecamatan"),
                'wargabelajar_alamat_kabupaten'    => $this->input->post("wargabelajar_alamat_kabupaten"),
                'wargabelajar_alamat_provinsi'     => $this->input->post("wargabelajar_alamat_provinsi"),
                'wargabelajar_alamat_kodepos'      => $this->input->post("wargabelajar_alamat_kodepos"),
                'wargabelajar_kejar'               => $this->input->post("wargabelajar_kejar"),
                'wargabelajar_kejar_alamat'        => $this->input->post("wargabelajar_kejar_alamat"),
                'wargabelajar_sttb'                => $this->input->post("wargabelajar_sttb"),
                'wargabelajar_masuk'               => $this->input->post("wargabelajar_masuk"),
                'wargabelajar_foto'                => $foto,
                'tahunajaran_id'                   => $this->input->post("tahunajaran_id"),

            );
            $this->db->where('wargabelajar_id',$this->input->post("id"));
            return $this->db->update($this->_table, $data);    
        }
        public function getAll(){
            return $this->db->get($this->_table)->result();
        }
        public function getById($id)
        {
            return $this->db->get_where($this->_table, ["wargabelajar_id" => $id])->row();
        }
        public function delete($id){
            $this->_deleteImage($id);
            return $this->db->delete($this->_table, array("wargabelajar_id" => $id));
        }
        public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result();
        }
        
    }
?>