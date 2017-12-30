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

        $this->db->select('coordonnees.lat as lat, coordonnees.longi as longi, coordonnees.quartier_id as quartier_id, quartier.nom as quartier_nom, equipe.nom as possesseur, equipe.couleur as couleur, quartier.QG as QG');
        $this->db->from('coordonnees');
        $this->db->join('quartier', 'quartier.id = coordonnees.quartier_id');
        $this->db->join('equipe', 'quartier.equipe_id = equipe.id');
        $query = $this->db->get();

        return $query->result();
    }


}