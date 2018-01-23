<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:26
 */
class Inventaire_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getItemInInventaire() {

        $this->db->select('COUNT(i.item_id) as nb, link, nom');
        $this->db->from('inventaire as i');
        $this->db->join('item as it', 'it.id=i.item_id');
        $this->db->where('i.user_id='.$_SESSION['utilisateur']->id);
        $this->db->group_by('i.item_id');
        $query = $this->db->get();

        return $query->result();
    }

}