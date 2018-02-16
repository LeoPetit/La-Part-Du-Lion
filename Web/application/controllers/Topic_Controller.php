<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:14
 */
class Topic_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        session_start();
        $this->load->helper(array('form', 'url'));

        $this->load->model('Topic_Model', 't');
        if(isset($_SESSION['utilisateur'])){
            $result["topics"] = $this->t->getAllTopics($_SESSION["utilisateur"]->equipe_id);
        }else{
            $result=null;
        }
        $this->load->view('Forum/topics.php', $result);
    }

    public function addSubject(){
        session_start();

        $this->load->helper(array('form', 'url'));

        $this->load->model('Topic_Model', 't');
        $data["createur"] = $_SESSION['utilisateur']->id ;
        $data["sujet"] = $this->input->post("topicTitle");
        $data["dateCreation"] = Date('Y-m-d h:i:s');


        if($this->input->post("target") == "clan"){
            $data["clan_id"] = $_SESSION['utilisateur']->equipe_id;
        }
        else{
            $data["clan_id"] = null;
        }

        $this->t->addTopic($data);

        $this->load->model('Commentaire_Model', 'c');
        $data2["auteur"] = $_SESSION['utilisateur']->id ;
        $data2["contenu"] = $this->input->post("answer");
        $date = DateTime::createFromFormat('Y-m-d H:i:s', Date('Y-m-d H:i:s'));
        $data2["datePoste"] = $date->format('Y-m-d H:i:s') ;
        $data2["topic_id"] = $this->t->getLastTopic()[0]->id;

        $this->c->addCommentaire($data2);
    }
}