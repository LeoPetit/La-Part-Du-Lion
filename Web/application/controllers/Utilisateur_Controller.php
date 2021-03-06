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
        $this->load->database();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->view('Connection/index.php');
    }

    public function connection()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'pseudo', 'required', array('required' => 'Vous devez entrer un %s'));
        $this->form_validation->set_rules('Password', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Connection/index.php');
        } else {
            $userName = $this->input->post("pseudo");
            $mdp = $this->input->post("Password");

            $this->load->model('Utilisateur_Model', 'u');

            //$mdp = $this->encryption->encrypt($mdp);

            $isRegistered = $this->u->connection($userName, $mdp);

            if (empty($isRegistered)) {
                $data["error"] = "unregistered";
                $this->load->view('Connection/index.php', $data);
            } else {
                session_start();
                $_SESSION["utilisateur"] = $isRegistered[0];
                $this->setRevenu();
                //$this->session->utilisateur = $isRegistered[0];
                $this->load->view('Jeu/map.php');
            }
        }
    }

    public function setRevenu() {
        if(!$_SESSION['utilisateur']->revenuJournalier) {
            $this->load->model('Utilisateur_Model', 'u');
            $this->load->model('Quartier_Model', 'q');

            $revenu = $this->q->revenusTotalEquipe($_SESSION['utilisateur']->equipe_id);

            $_SESSION['utilisateur']->gold = $_SESSION['utilisateur']->gold + $revenu[0]->revenusTotalEquipe;

            $this->u->setRevenuJournalier();
        }
    }

    public function preEnregistrement()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('pseudo', 'pseudo', 'required|is_unique[utilisateur.pseudo]', array('required' => 'Vous devez entrer un %s','is_unique' => '%s existe déjà'));
        $this->form_validation->set_rules('Mail', 'email', 'trim|required|valid_email|is_unique[utilisateur.email]', array('required' => 'Vous devez entrer un %s', 'is_unique' => '%s existe déjà', 'valid_email' => 'Vous devez entrer un %s valide'));
        $this->form_validation->set_rules('password', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));


        function rolekey_exists($key) {
            $this->Utilisateur_model->mail_exists($key);
        }
        function rolekey_exists2($key) {
            $this->Utilisateur_model->pseudo_exists($key);
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Connection/index.php');
        } else {
            $data["pseudo"] = $this->input->post("pseudo");
            $data["mdp"] = $this->input->post("password");
            $data["email"] = $this->input->post("Mail");

            $this->load->model('Equipe_Model', 'e');
            $result = $this->e->getDescriptionClan();
            $data["descriptif"] = $result;
            $this->load->view('Clan/choisirClan.php', $data);
        }
    }

    public function enregistrement()
    {
        $data["pseudo"] = $this->input->post("pseudo");
        $data["mdp"] = $this->input->post("password");
        $data["email"] = $this->input->post("Mail");
        $data["pointAction"] = 4;
        $data["gold"] = 100;
        $data["equipe_id"] = $this->input->post("clan");

        $this->load->model('Utilisateur_Model', 'u');

        $this->u->enregistrement($data);

        $isRegistered = $this->u->connection($data["pseudo"], $data["mdp"]);

        $_SESSION["utilisateur"] = $isRegistered[0];
        $return["message"] = "e";
        $this->load->view('Accueil/index.php',$return);
    }

    public function deconnection()
    {
        session_start();
        session_unset();
        //unset($_SESSION["utilisateur"]);
        session_destroy();
        $this->load->view('Jeu/map.php');
    }

    public function achat()
    {
        $this->load->model('Utilisateur_Model', 'u');
        //$this->u->addItemInInventaire($_SESSION["utilisateur"]->id,$this->input->post("item_id"));
        $this->u->UpdateBudget($_SESSION["utilisateur"]->id, $this->input->post("prix"), "diminuer");
        $this->load->view("Jeu/boutique.php");
    }

    public function modification()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->view('Compte/index.php');
    }

    public function updateMdp()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'mot de passe', 'required', array('required' => 'Vous devez entrer un %s.'));

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('Compte/index.php');

        } else {
            session_start();
            $idJoueur = $_SESSION["utilisateur"]->id;
            $data["mdp"] = $this->input->post("password");
            $this->load->model('Utilisateur_Model', 'u');
            $this->u->UpdateUser($data, $idJoueur);
            $_SESSION["utilisateur"]->mdp =  $data["mdp"];
            $this->load->view('Compte/index.php');
        }
    }

    public function updateEmail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail', 'email', 'trim|required|valid_email', array('required' => 'Vous devez entrer un %s', 'is_unique' => '%s existe déjà', 'valid_email' => 'Vous devez entrer un %s valide'));
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Compte/index.php');
        } else {
            session_start();
            $idJoueur = $_SESSION["utilisateur"]->id;
            $data["email"] = $this->input->post("mail");
            $this->load->model('Utilisateur_Model', 'u');
            $this->u->UpdateUser($data, $idJoueur);
            $_SESSION["utilisateur"]->email =  $data["email"];
            $this->load->view('Compte/index.php');
        }

    }
}