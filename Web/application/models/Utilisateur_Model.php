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
        $this->db->select('pseudo, mdp, utilisateur.id, gold, equipe_id, email, equipe.couleur, revenuJournalier');
        $this->db->from('utilisateur');
        $this->db->join('equipe', 'equipe.id=utilisateur.equipe_id');
        $this->db->where('pseudo', $userName);
        $this->db->where('mdp', $userMDP);
        $query = $this->db->get();

        return $query->result();
    }

    public function enregistrement($data) {
        $this->db->insert('utilisateur', $data);
    }

    public function setGolds($prix)
    {
        // problème avec $prix
        $this->db->set('gold', $prix);
        $this->db->where('id', $_SESSION['utilisateur']->id);
        $this->db->update('utilisateur');

    }

    public function updateUser($data,$idJoueur)
    {
        $this->db->where('id', $idJoueur);
        $this->db->update('utilisateur',$data);
    }

    function mail_exists($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('utilisateur');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
    function pseudo_exists($key)
    {
        $this->db->where('pseudo',$key);
        $query = $this->db->get('utilisateur');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function setRevenuJournalier() {
        $this->db->set('revenuJournalier', true);
        $this->db->set('gold', $_SESSION['utilisateur']->gold);
        $this->db->where('id', $_SESSION['utilisateur']->id);
        $this->db->update('utilisateur');
    }
}