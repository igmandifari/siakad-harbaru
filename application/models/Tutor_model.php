<?php

    Class Tutor_model extends CI_Model 
    {
        private $_table = "tutor";
        public $tutor_id;
        public function rules()
        {
            return[
                [
                    'field' => 'tutor_nomor_induk',
                    'label' => 'NIP',
                    'rules' => 'required|trim|numeric|xss_clean',
                ],
                [
                    'field' => 'tutor_nama',
                    'label' => 'Nama',
                    'rules' => 'required|trim|xss_clean',
                ],
                [
                    'field' => 'tutor_tempat_lahir',
                    'label' => 'Tempat Lahir',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_rtrw',
                    'label' => 'RT/RW',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_desa',
                    'label' => 'Des/Kel',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_kecamatan',
                    'label' => 'Kecamatan',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_kabupaten',
                    'label' => 'Kota/Kabupaten',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_provinsi',
                    'label' => 'Provinsi',
                    'rules' => 'trim|xss_clean',
                ],
                [
                    'field' => 'tutor_alamat_kodepos',
                    'label' => 'Kode POS',
                    'rules' => 'trim|numeric|xss_clean',
                ]
            ];
        }
        private function _uploadImage()
        {
            $config['upload_path']          = './upload/images/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['file_name']            = $this->tutor_id;
            $config['overwrite']			= true;
            $config['max_size']             = 500; // 
        
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('tutor_foto')) {
                return $this->upload->data("file_name");
            }
            return "default.jpg";

        }
        private function _deleteImage($id)
        {
            $tutor = $this->getById($id);
            if ($tutor["tutor_foto"] != "default.jpg") {
                $filename = explode(".", $tutor["tutor_foto"])[0];
                return array_map('unlink', glob(FCPATH."upload/images/$filename.*"));
            }
        }
        public function simpan(){
            $this->tutor_id = uniqid();
            $data= array(
                'tutor_id'                  => $this->tutor_id,
                'tutor_nomor_induk'                 => $this->input->post("tutor_nomor_induk"),
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
                'tutor_password'            => md5(sha1($this->input->post("tutor_nomor_induk"))),
                'tutor_foto'                => $this->_uploadImage()
            );
            return $this->db->insert($this->_table, $data);
        }
        public function perbarui_password()
        {
            $this->tutor_id = $this->input->post("id");
            $password = md5(sha1($this->input->post("tutor_password")));
        
            return $this->db->query("UPDATE tutor SET tutor_password='$password' WHERE tutor_id='$this->tutor_id'");
        }
        public function perbarui()
        {
            $this->tutor_id = $this->input->post("id");
            if (!empty($_FILES["tutor_foto"]["name"])) {
                $foto = $this->_uploadImage();
            } else {
                $foto = $this->input->post("old_image");
            }
            $data= array(
                'tutor_nomor_induk'         => $this->input->post("tutor_nomor_induk"),
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
                'tutor_foto'                => $foto
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
            $this->_deleteImage($id);
            return $this->db->delete($this->_table, array("tutor_id" => $id));
        }
        
    }
?>