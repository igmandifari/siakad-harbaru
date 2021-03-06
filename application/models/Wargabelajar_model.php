<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    Class Wargabelajar_model extends CI_Model 
    {
        private $_table = "wargabelajar";
        public $id;
        public $nomor_induk;
        public $nisn;
        public $nama;
        public $nik;
        public $jenis_kelamin;
        public $tempat_lahir;
        public $tanggal_lahir;
        public $kewarganegaraan;
        public $alamat_jalan;
        public $alamat_rtrw;
        public $alamat_desa;
        public $alamat_kecamatan;
        public $alamat_kabupaten;
        public $alamat_provinsi;
        public $alamat_kodepos;
        public $kejar;
        public $kejar_alamat;
        public $sttb;
        public $masuk;
        public $tahunajaran_id;
        public $foto;
        public $password;
        public $orangtua_ayah_nama;
        public $orangtua_ayah_pekerjaan;
        public $orangtua_ayah_alamat_jalan;
        public $orangtua_ayah_alamat_rtrw;
        public $orangtua_ayah_alamat_desa;
        public $orangtua_ayah_alamat_kecamatan;
        public $orangtua_ayah_alamat_kabupaten;
        public $orangtua_ayah_alamat_provinsi;
        public $orangtua_ayah_alamat_kodepos;
        public $orangtua_ibu_nama;
        public $orangtua_wali_nama; 
        public $orangtua_wali_pekerjaan; 
        public $orangtua_wali_alamat_jalan; 
        public $orangtua_wali_alamat_rtrw; 
        public $orangtua_wali_alamat_desa; 
        public $orangtua_wali_alamat_kecamatan; 
        public $orangtua_wali_alamat_kabupaten; 
        public $orangtua_wali_alamat_provinsi; 
        public $orangtua_wali_alamat_kodepos;

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
                 'rules'    => 'required|trim|numeric|xss_clean|is_unique[wargabelajar.wargabelajar_nomor_induk]'],
                 ['field'    => 'wargabelajar_nisn',
                 'label'    => 'NISN',
                 'rules'    => 'trim|numeric|xss_clean|is_unique[wargabelajar.wargabelajar_nisn]'],
                 ['field'    => 'wargabelajar_nama',
                 'label'    => 'Nama',
                 'rules'    => 'required|trim|xss_clean'],
                 ['field'    => 'wargabelajar_jenis_kelamin',
                 'label'    => 'Jenis Kelamin',
                 'rules'    => 'required|xss_clean'],
                 ['field'    => 'wargabelajar_tempat_lahir',
                 'label'    => 'Tempat Lahir',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_tanggal_lahir',
                 'label'    => 'Tanggal Lahir',
                 'rules'    => 'trim|xss_clean|required'],
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
                 'rules'    => 'required|trim|xss_clean|callback_select_validate',
                ],
                [
                    'field' => 'wargabelajar_agama',
                    'label' => 'Agama',
                    'rules'    => 'required|trim|xss_clean|callback_select_validate',
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
        public function rules_2(){
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
                 ['field'    => 'wargabelajar_jenis_kelamin',
                 'label'    => 'Jenis Kelamin',
                 'rules'    => 'required|xss_clean'],
                 ['field'    => 'wargabelajar_tempat_lahir',
                 'label'    => 'Tempat Lahir',
                 'rules'    => 'trim|xss_clean'],
                 ['field'    => 'wargabelajar_tanggal_lahir',
                 'label'    => 'Tanggal Lahir',
                 'rules'    => 'trim|xss_clean|required'],
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
                 'rules'    => 'required|trim|xss_clean|callback_select_validate',
                ],
                [
                    'field' => 'wargabelajar_agama',
                    'label' => 'Agama',
                    'rules'    => 'required|trim|xss_clean|callback_select_validate',
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
            $tanggal_lahir = $this->input->post("wargabelajar_tanggal_lahir");
            $nama = $this->input->post("wargabelajar_nama");
            $years = substr($tanggal_lahir, 2,2);
            $month = substr($tanggal_lahir, 5,2);
            $date = substr($tanggal_lahir, 8,2);
            $first_name = strtoupper(substr($nama, 0,1));
            
            $password = $first_name.$date.$month.$years; 
            $data= array(
                'wargabelajar_id'                  => $this->wargabelajar_id,
                'wargabelajar_nomor_induk'         => $this->input->post("wargabelajar_nomor_induk"),
                'wargabelajar_nisn'                => $this->input->post("wargabelajar_nisn"),
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
                'wargabelajar_password'            => md5(sha1($password)),
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
            $this->db->order_by('wargabelajar_nomor_induk desc');
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
            return $this->db->query('SELECT * FROM tahunajaran ORDER BY tahunajaran_nama DESC')->result();
        }
        public function getAlls()
        {
            return $this->db->query("SELECT * FROM wargabelajar INNER JOIN tahunajaran ON tahunajaran.tahunajaran_id=wargabelajar.tahunajaran_id")->result();
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
        public function get_nik()
        {
            return $this->db->query("SELECT wargabelajar.wargabelajar_nomor_induk as nik FROM wargabelajar ORDER BY wargabelajar.wargabelajar_nomor_induk DESC LIMIT 1")->row_array();
        }
        public function get_tahun_active()
        {
            $this->db->where('is_active',1);
            return $this->db->get('tahunajaran')->row_array();
        }
    }