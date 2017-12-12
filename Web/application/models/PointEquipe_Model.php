<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:26
 */
class PointEquipe_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function classementQuartier($id) {

        $this->db->select('equipe.nom as nomClan, nbpoints, equipe.couleur');
        $this->db->from('pointEquipe');
        $this->db->join('quartier', 'quartier.id = pointEquipe.quartier_id');
        $this->db->join('equipe', 'pointEquipe.equipe_id = equipe.id');
        $this->db->where('quartier.id',$id);
        $this->db->order_by('nbpoints','desc');
        $query = $this->db->get();

        return $query->result();
    }

}