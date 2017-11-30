<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:24
 */
class Utilisateur_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function show()
    {
        //$this->load->view('Connection/index.php');
        $this->connection("Lea", "0000");
    }

    public function connection($userName, $userPass) {

        $this->load->model('Utilisateur_Model', 'u');

        $isRegistered = $this->u->connection($userName, $userPass);

        if(empty($isRegistered)) {
            $data['error'] = "unregistered";
            $this->load->view('Connection/index.php', $data);
        } else {
            $this->session->utilisateur = $isRegistered[0];
            $data['error'] = "registered";
            $this->load->view('index.php', $data);
        }
    }

}