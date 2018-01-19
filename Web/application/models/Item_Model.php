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
        $this->db->select('id,nom,coutAchat,coutRessource');
        $this->db->from('item');
        $this->db->order_by('id');
        $query = $this->db->get();

        return $query->result();
    }

    function getItemInInventaire($idJoueur)
    {
        // récupère les items dans l'inventaire du joueur
        /*
        $this->db->select('');
        $this->db->from('');
        $this->db->where('user_id',$idJoueur);
        $query = $this->db->get();

        return $query->result();*/
    }

    function achatItem($idItem,$idJoueur)
    {
        // update : ajoute un item dans l'inventaire du joueur et retire son prix de ses thunes
    }
}