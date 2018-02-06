<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 24/01/18
 * Time: 16:48
 */
class Topic_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllTopics($clan_id) {

        $this->db->select('t.id, t.sujet, t.dateCreation, u.pseudo, COUNT(c.id) AS nbCommentaires, t.clan_id');
        $this->db->from('topic as t');
        $this->db->join('commentaire as c', 't.id = c.topic_id');
        $this->db->join('utilisateur as u', 'u.id = t.createur');
        $this->db->where('t.clan_id', $clan_id);
        $this->db->or_where('t.clan_id', NULL);
        $this->db->group_by('t.id');
        $this->db->order_by('t.dateCreation','desc');
        $this->db->distinct('t.id');
        $query = $this->db->get();

        return $query->result();
    }

    public function getLastTopic() {
        $this->db->select('t.id');
        $this->db->from('topic as t');
        $this->db->order_by('t.id','desc');
        $this->db->limit('1');
        $query = $this->db->get();

        return $query->result();
    }

    public function getCurrentSubject($id_topic){
        $this->db->select('t.sujet, t.id');
        $this->db->from('topic as t');

        $this->db->where('t.id', $id_topic);

        $query = $this->db->get();

        return $query->result();
    }

    public function addTopic($data) {
        $this->db->insert('topic', $data);
    }

    public function deleteTopic($id) {
        $this->db->delete('topic', array('id' => $id));
    }
}