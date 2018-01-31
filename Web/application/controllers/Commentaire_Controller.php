<?php

/**
 * Created by PhpStorm.
 * User: jérémy renaud
 * Date: 24/01/2018
 * Time: 17:03
 */
class Commentaire_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->view('Forum/topics.php');
    }

    public function subject($idTopic){
        $this->load->helper(array('form', 'url'));
        $result=null;
        $this->load->model('Topic_Model', 't');
        /*if($idTopic = null) {
            $idTopic = $this->t->getCurrentSubject($_POST['idSubject'])[0];
        }*/
        $result['subject'] = $this->t->getCurrentSubject($idTopic)[0];

        $this->load->model('Commentaire_Model', 'c');
        $result["commentaires"] = $this->c->getAllCommentaires($idTopic);

        $this->load->view('Forum/forum.php', $result);
    }

    public function addComment(){
        $this->load->helper(array('form', 'url'));
        session_start();

        $result=null;

        $this->load->model('Topic_Model', 't');
        $idTopic = $this->t->getCurrentSubject($_POST['idSubject'])[0];

        $this->load->model('Commentaire_model', 'c');
        $data2["auteur"] = $_SESSION['utilisateur']->id ;
        $data2["contenu"] = $this->input->post("answer");
        $data2["datePoste"] = Date('Y-m-d  h:i:s');
        $data2["topic_id"] = $idTopic->id;

        $this->c->addCommentaire($data2);

        $result['subject'] = $this->t->getCurrentSubject($idTopic->id);

        $this->load->model('Commentaire_Model', 'c');
        $result["commentaires"] = $this->c->getAllCommentaires($idTopic->id);
        $result["subject"] = $idTopic;

        $this->load->view('Forum/forum.php', $result);
    }
}