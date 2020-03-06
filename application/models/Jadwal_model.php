<?php

class Jadwal_model extends CI_Model{

    private $_table = "jadwal";
    public $id;
    public $nama;
    public $tutor;
    public $matpel;

    public function rules(){
        return[
            [
                'field' => 'rombel_id',
                'label' => 'Kelas',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_hari',
                'label' => 'Hari',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'matpel_id',
                'label' => 'Mata Pelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'tutor_id',
                'label' => 'Tutor',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_waktu',
                'label' => 'Waktu',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ]
           
        ];
    }
    public function rules_tutorial_mandiri(){
        return[
            [
                'field' => 'rombel_id_other',
                'label' => 'Kelas',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'matpel_id_other',
                'label' => 'Mata Pelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'tutor_id_other',
                'label' => 'Tutor',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ],
            [
                'field' => 'jadwal_tipe_pembelajaran',
                'label' => 'Tipe Pembelajaran',
                'rules'    => 'required|trim|xss_clean|callback_select_validate',
            ]
        ];
    }
    public function simpan()
    {
        $data = array(
            'jadwal_id'                 => uniqid(),
            'jadwal_hari'               => $this->input->post("jadwal_hari"),
            'matpel_id'                 => $this->input->post("matpel_id"),
            'tutor_id'              => $this->input->post("tutor_id"),
            'rombel_id'                 => $this->input->post("rombel_id"),
            'tahunajaran_id'            => $this->uri->segment('3'),
            'jadwal_waktu'              => $this->input->post("jadwal_waktu"),
            'jadwal_tipe_pembelajaran'  => 'Tatap Muka',
            'created_at'                => date('Y-m-d H:i:s')

        );
        return $this->db->insert($this->_table,$data);
    }

    public function perbarui()
    {
        $data = array(
            'jadwal_hari'           => $this->input->post("jadwal_hari"),
            'matpel_id'             => $this->input->post("matpel_id"),
            'tutor_id'              => $this->input->post("tutor_id"),
            'rombel_id'             => $this->input->post("rombel_id"),
            'jadwal_waktu'          => $this->input->post("jadwal_waktu"),
            'updated_at'            => date('Y-m-d H:i:s')

        );
        $this->db->where('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
                
    public function save_tutorial_mandiri()
    {
        $data = array(
            'jadwal_id'                 => uniqid(),
            'jadwal_tipe_pembelajaran'  => $this->input->post("jadwal_tipe_pembelajaran"),
            'tahunajaran_id'            => $this->uri->segment('3'),
            'matpel_id'                 => $this->input->post("matpel_id_other"),
            'tutor_id'                  => $this->input->post("tutor_id_other"),
            'rombel_id'                  => $this->input->post("rombel_id_other"),
            'created_at'                => date('Y-m-d H:i:s')

        );
        return $this->db->insert($this->_table,$data);
    }
    public function update_tutorial_mandiri()
    {
        $data = array(
            'matpel_id'                     => $this->input->post("matpel_id_other"),
            'rombel_id'                     => $this->input->post("rombel_id_other"),
            'tutor_id'                  => $this->input->post("tutor_id_other"),
            'jadwal_tipe_pembelajaran'      => $this->input->post("jadwal_tipe_pembelajaran"),
            'updated_at'                    => date('Y-m-d H:i:s')

        );
        $this->db->where('jadwal_id',$this->input->post("id"));
        return $this->db->update($this->_table, $data);
    }
    public function getAll()
    {
            $query = $this->db->query("select * from jadwal inner join matpel on matpel.matpel_id = jadwal.matpel_id INNER JOIN kelas on kelas.kelas_id = jadwal.kelas_id inner join tutor on tutor.tutor_id = jadwal.tutor_id");
            return $query->result();
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["jadwal_id" => $id])->row_array();
    }
    
    public function delete($id){
        return $this->db->delete($this->_table, array("jadwal_id" => $id));
    }
    public function getKelas($tahun){
        return $this->db->query("select rombel.rombel_id, kelas.kelas_nama from kelas inner join rombel on rombel.kelas_id=kelas.kelas_id where rombel.tahunajaran_id='$tahun'")->result();
    }
    public function getMatpel(){
        return $this->db->get("matpel")->result();
    }
    public function getTutors(){
        return $this->db->get("tutor")->result();
    }
    public function getTahunajaran(){
        $this->db->order_by('tahunajaran_nama desc');
        return $this->db->get("tahunajaran")->result();
    }
    public function getTahun($tahun){
        $this->db->where('tahunajaran_id',$tahun);
        return $this->db->get('tahunajaran')->row_array();
    }
    public function getMatpelTahun($tahun){
        return $this->db->query("SELECT tahunajaran.tahunajaran_nama,tutor.tutor_nama, tahunajaran.tahunajaran_id, jadwal_id, jadwal_hari, matpel_nama, kelas_nama, jadwal_waktu, jadwal_tipe_pembelajaran FROM jadwal left join tahunajaran on tahunajaran.tahunajaran_id = jadwal.tahunajaran_id RIGHT join rombel on rombel.rombel_id = jadwal.rombel_id inner join kelas on kelas.kelas_id = rombel.kelas_id LEFT join matpel on matpel.matpel_id=jadwal.matpel_id  INNER join tutor on tutor.tutor_id = jadwal.tutor_id where jadwal.tahunajaran_id ='$tahun' ORDER BY jadwal.jadwal_tipe_pembelajaran ASC, jadwal.jadwal_hari ASC")->result();
    }
    public function delTahun($id){
        return $this->db->delete($this->_table,array('tahunajaran_id' => $id));
    }
    public function nameoftahunajaran($tahun){
        $this->db->where('tahunajaran_id',$tahun);
        return $this->db->get('tahunajaran')->row_array();
    }
    public function getJadwals($tahun)
        {
            return $this->db->query("SELECT tahunajaran.tahunajaran_nama,tutor.tutor_nama, tahunajaran.tahunajaran_id, jadwal.jadwal_id, jadwal.jadwal_hari, matpel.matpel_nama, kelas.kelas_nama, jadwal.jadwal_waktu, jadwal.jadwal_tipe_pembelajaran FROM jadwal left join tahunajaran on tahunajaran.tahunajaran_id = jadwal.tahunajaran_id RIGHT join rombel on rombel.rombel_id = jadwal.rombel_id inner join kelas on kelas.kelas_id = rombel.kelas_id LEFT join matpel on matpel.matpel_id=jadwal.matpel_id  INNER join tutor on tutor.tutor_id = jadwal.tutor_id where jadwal.tahunajaran_id ='$tahun' ORDER BY jadwal.jadwal_tipe_pembelajaran ASC, jadwal.jadwal_hari ASC")->result();
    
        }
}