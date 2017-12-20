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
        $this->db->select('pseudo, mdp, utilisateur.id, gold, equipe_id, email, equipe.couleur');
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
    public function addItemInInventaire($idJoueur)
    {

    }
    public function updateBudget($idJoueur,$prix,$transaction)
    {
        echo $prix;
        if ($transaction =="diminuer")
        {
            // problème avec $prix
            $this->db->set('gold', 'gold -'.$prix, FALSE);
            $this->db->where('id', $idJoueur);
            $this->db->update('Utilisateur');
        }
        else
        {
            $this->db->set('gold', 'gold+'.$prix, FALSE);
            $this->db->where('id', $idJoueur);
            $this->db->update('Utilisateur');
        }
    }
    public function updateUser($data,$idJoueur)
    {
        $this->db->where('id', $idJoueur);
        $this->db->update('utilisateur',$data);
    }
}