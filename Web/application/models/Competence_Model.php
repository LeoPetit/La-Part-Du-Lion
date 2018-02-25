<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:25
 */
class Competence_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllCompetenceEquipe($id) {
        $this->db->select("CONCAT(c.nom,' ', (c.coutTotal-ce.coutPaye), ' Gold') as text, c.competence_parent");
        $this->db->from('competence as c');
        $this->db->join('competenceEquipe as ce', 'c.id = ce.competence_id');
        $this->db->where('ce.equipe_id='.$id);
        $query = $this->db->get();

        return $query->result();
    }
}