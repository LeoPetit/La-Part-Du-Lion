<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:22
 */
class Equipe_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {

        $this->load->helper(array('form', 'url'));

        $equipe_user = $this->session->utilisateur->equipe_id;
        $i = 1;
        $this->load->model('Quartier_Model', 'q');

        $controlled = $this->q->nombreQuartierDuClan($equipe_user);

        $classementTotal = $this->q->getClassement($equipe_user);

        $revenusTotalEquipe = $this->q->revenusTotalEquipe($equipe_user);

        foreach($classementTotal as $c) {
            if($c->equipe_id == $equipe_user) {
                $return["classement"] = $i;
            }
            $i++;
        }

        $return["controlled"] = ($controlled[0]->NbQuartier/36)*100;
        $return["revenusEquipe"] = $revenusTotalEquipe[0]->revenusTotalEquipe;

        $this->load->view("Clan/index.php", $return);
    }
}