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

}