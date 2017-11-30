<?php

/**
 * Created by PhpStorm.
 * User: jérémy renaud
 * Date: 28/11/2017
 * Time: 10:51
 */
class Utilisateur_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function connection($userName, $userMDP) {
        $this->db->select('pseudo, mdp, id, gold, equipe_id, email');
        $this->db->from('utilisateur');
        $this->db->where('pseudo', $userName);
        $this->db->where('mdp', $userMDP);
        $query = $this->db->get();

        return $query->result();
    }

    public function enregistrement($data) {
        $this->db->insert('utilisateur', $data);
    }
}