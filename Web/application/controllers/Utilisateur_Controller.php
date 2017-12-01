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
        $this->form_validation->set_rules('Password', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Connection/index.php');
        }
        else
        {
            $userName = $this->input->post("pseudo");
            $mdp = $this->input->post("Password");

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

    public function preEnregistrement() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'pseudo', 'required', array('required' => 'Vous devez entrer un %s'));
        $this->form_validation->set_rules('Mail', 'email', 'trim|required|valid_email', array('required' => 'Vous devez entrer un %s', 'is_unique' => '%s existe déjà'));
        $this->form_validation->set_rules('password', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Connection/index.php');
        }
        else
        {
            $data["pseudo"] = $this->input->post("pseudo");
            $data["mdp"] = $this->input->post("password");
            $data["email"] = $this->input->post("Mail");


            $this->load->view('Clan/choisirClan.php', $data);
        }
    }

    public function enregistrement() {

        $data["pseudo"] = $this->input->post("pseudo");
        $data["mdp"] = $this->input->post("password");
        $data["email"] = $this->input->post("Mail");
        $data["pointAction"] = 4;
        $data["gold"] = 100;
        $data["equipe_id"] = $this->input->post("clan");

        $this->load->model('Utilisateur_Model', 'u');

        $this->u->enregistrement($data);

        $isRegistered = $this->u->connection($data["pseudo"], $data["mdp"]);

        $this->session->utilisateur = $isRegistered[0];
        $this->load->view('index.php');
    }

    public function deconnection() {
        unset($_SESSION["utilisateur"]);
        $this->load->view("Accueil/index.php");
    }
}