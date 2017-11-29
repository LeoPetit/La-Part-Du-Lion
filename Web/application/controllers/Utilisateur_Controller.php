<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:24
 */
class Utilisateur_Controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('index');
    }

    public function connection($userName, $userPass) {

        $this->load->model('Utilisateur_Model', 'u');

        $isRegistered = $this->u->connection();

        echo $isRegistered;
    }

}