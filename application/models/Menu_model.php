<?php

class Menu_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get("menu")->result();
    }
}