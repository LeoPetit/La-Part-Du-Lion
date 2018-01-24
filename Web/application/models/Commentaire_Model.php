<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 24/01/18
 * Time: 16:48
 */
class Commentaire_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllCommentaires($topic_id) {

        $this->db->select('c.contenu, c.datePoste, u.pseudo');
        $this->db->from('commentaire as c');
        $this->db->join('utilisateur as u', 'u.id = c.auteur');
        $this->db->where('c.topic_id', $topic_id);
        $this->db->order_by('c.datePoste','desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function addCommentaire($data) {
        $this->db->insert('commentaire', $data);
    }

    public function deleteCommentaire($id) {
        $this->db->delete('commentaire', array('id' => $id));
    }
}