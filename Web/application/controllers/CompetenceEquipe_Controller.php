<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:21
 */
class CompetenceEquipe_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function addGoldToCompetence() {
        $this->load->model('CompetenceEquipe_Model', 'c');
        $this->load->model('Utilisateur_Model', 'u');

        session_start();

        $id = $this->input->post("id");
        $gold = $this->input->post("gold");

        $this->u->setGolds($_SESSION["utilisateur"]->gold-$gold);

        $_SESSION["utilisateur"]->gold = ($_SESSION["utilisateur"]->gold-$gold);

        $this->c->addGoldToCompetence($id, $gold);
    }
}