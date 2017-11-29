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
        $this->connection("Leo", "0000");
    }

    public function connection($userName, $userPass) {

        $this->load->model('Utilisateur_Model', 'u');

        $isRegistered = $this->u->connection($userName, $userPass);

        if(empty($isRegistered)) {
            echo 1;
        } else {
            $this->load->library('session');
            var_dump($isRegistered);
            $this->session->pseudo = $isRegistered[0]->pseudo;
        }
    }

}