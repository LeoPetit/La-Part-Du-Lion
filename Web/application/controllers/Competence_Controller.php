<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:20
 */
class Competence_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index()
    {
        $this->load->view('Clan/competence.php');
    }

    public function show() {
        $this->load->model('Competence_Model', 'c');

        session_start();
        $competences = $this->c->getAllCompetenceEquipe($_SESSION['utilisateur']->equipe_id);

        echo json_encode($competences);
    }

    public function getCompetence($id) {
        $this->load->model('Competence_Model', 'c');

        $competence = $this->c->getCompetence($id);

        echo json_encode($competence);
    }
}