<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 19/01/18
 * Time: 15:10
 */
class Effet_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getEffetItem($idItem) {
        $this->db->select('e.*');
        $this->db->from('effet as e');
        $this->db->join('effetItem as ei', 'ei.effet_id = e.id');
        $this->db->where('ei.item_id', $idItem);
        $query = $this->db->get();

        return $query->result();
    }

}