<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:25
 */
class Equipe_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function  getDescriptionClan()
    {
        $this->db->select('descriptif,nom');
        $this->db->from('equipe');
        $query = $this->db->get();

        return $query->result();
    }
}