<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:24
 */
class Utilisateur_Controller extends CI_Controller
{
    public function show()
    {
        $this->load->view('Connection/index.php');
    }

    public function connection($userName, $userPass) {

        $this->load->model('Utilisateur_Model', 'u');

        $isRegistered = $this->u->connection();

        echo $isRegistered;
    }

}