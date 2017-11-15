<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:15
 */
class Coordonnees_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function show() {
        //return $this->db->get("coordonnees")->result();

        $this->db->select('coordonnees.lat as lat, coordonnees.longi as longi, coordonnees.quartier_id as quartier_id, quartier.couleur as couleur');
        $this->db->from('coordonnees');
        $this->db->join('quartier', 'quartier.id = coordonnees.quartier_id');
        $query = $this->db->get();

        return $query->result();
    }
}