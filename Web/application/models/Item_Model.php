<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:26
 */
class Item_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getItemInDataBase()
    {
        // récupère les items en BDD

        $this->db->distinct();
        $this->db->select('id,nom,coutAchat,coutRessource, libelle,link');
        $this->db->from('item');
        $this->db->order_by('id');
        $query = $this->db->get();

        return $query->result();
    }
}