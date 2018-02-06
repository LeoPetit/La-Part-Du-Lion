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

        $this->load->model('Topic_Model', 't');
        /*if($idTopic = null) {
            $idTopic = $this->t->getCurrentSubject($_POST['idSubject'])[0];
        }*/
        $test = $this->t->getCurrentSubject($idTopic);
        $result['subject'] = $test[0];

        $this->load->model('Commentaire_Model', 'c');
        $result["commentaires"] = $this->c->getAllCommentaires($idTopic);

        $this->load->view('Forum/forum.php', $result);
    }

    public function addComment(){
        $this->load->helper(array('form', 'url'));
        session_start();

        $this->load->model('Topic_Model', 't');

        $this->load->model('Commentaire_model', 'c');
        $data2["auteur"] = $_SESSION['utilisateur']->id ;
        $data2["contenu"] = $this->input->post("answer");
        $data2["datePoste"] = Date('Y-m-d h:i:s');
        $data2["topic_id"] = $this->input->post('idSubject');

        var_dump($data2);

        $this->c->addCommentaire($data2);
    }
}