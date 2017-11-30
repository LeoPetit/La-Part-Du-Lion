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
        $this->load->helper(array('form', 'url'));

        $this->load->view('Connection/index.php');
    }

    public function connection() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'pseudo', 'required', array('required' => 'Vous devez entrer un %s'));
        $this->form_validation->set_rules('mdp', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Connection/index.php');
        }
        else
        {
            $userName = $this->input->post("pseudo");
            $mdp = $this->input->post("mdp");

            $this->load->model('Utilisateur_Model', 'u');

            $isRegistered = $this->u->connection($userName, $mdp);

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
}