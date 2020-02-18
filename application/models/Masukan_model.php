<?php

class Masukan_model extends CI_Model {

	public function insert($data=array())
	{
		return $this->db->insert('masukan',$data);
	}
	public function get($id,$tahun)
	{

		return $this->db->query("SELECT * FROM masukan WHERE tahunajaran_id='$tahun' AND wargabelajar_id='$id' ORDER BY created_at DESC")->result_array();
	}
	public function getAll()
	{
		
		return $this->db->query("SELECT masukan.masukan_id,masukan.masukan,masukan.created_at,masukan.wargabelajar_id,wargabelajar.wargabelajar_nama,wargabelajar.wargabelajar_nomor_induk FROM masukan INNER JOIN wargabelajar ON wargabelajar.wargabelajar_id=masukan.wargabelajar_id")->result_array();
	}
	public function hapus($id)
	{
		$this->db->where('masukan_id',$id);
		return $this->db->delete('masukan');
	}
	public function getTahunAjaran(){
            return $this->db->get('tahunajaran')->result_array();
        }

}