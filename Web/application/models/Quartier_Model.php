<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:26
 */
class Quartier_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function nombreQuartierDuClan($clanId) {
        $this->db->select('COUNT(*) as NbQuartier, equipe_id');
        $this->db->from('quartier');
        $this->db->where('equipe_id', $clanId);
        $query = $this->db->get();

        return $query->result();
    }

    public function getClassement($clanId) {
        $this->db->select('COUNT(*) as NbQuartier, quartier.equipe_id, sum(nbPoints) as totalPoints');
        $this->db->from('quartier');
        $this->db->join('pointEquipe', 'pointEquipe.quartier_id=quartier.id');
        $this->db->group_by('equipe_id');
        $this->db->order_by('count(*), sum(nbPoints)', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function revenusTotalEquipe($clanId) {
        $this->db->select('SUM(revenus) as revenusTotalEquipe');
        $this->db->from('quartier');
        $this->db->where('equipe_id', $clanId);
        $query = $this->db->get();

        return $query->result();
    }
}