<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:25
 */
class CompetenceEquipe_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addGoldToCompetence($id, $gold) {
        $this->db->set('coutPaye', 'coutPaye+'.$gold.'', FALSE);
        $this->db->where('id', $id);
        $this->db->update('competenceEquipe');
    }
}