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
                $data["error"] = "unregistered";
                $this->load->view('Connection/index.php', $data);
            } else {
                $this->session->utilisateur = $isRegistered[0];
                $this->load->view('index.php');
            }
        }
    }

    public function enregistrement() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'pseudo', 'required', array('required' => 'Vous devez entrer un %s'));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]', array('required' => 'Vous devez entrer un %s'));
        $this->form_validation->set_rules('ConfirmEmail', '', 'required|valid_email|is_unique[users.email]', array('required' => 'Vous devez confirmer votre email'));
        $this->form_validation->set_rules('mdp', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Connection/index.php');
        }
        else
        {
            $data["pseudo"] = $this->input->post("pseudo");
            $data["mdp"] = $this->input->post("mdp");
            $data["email"] = $this->input->post("email");
            $data["pointAction"] = 4;
            $data["gold"] = 100;
            $data["equipe_id"] = 1;

            $this->load->model('Utilisateur_Model', 'u');

            var_dump($data);

            $this->u->enregistrement($data);
        }
    }
}