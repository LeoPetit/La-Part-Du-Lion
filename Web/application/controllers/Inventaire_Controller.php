<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:22
 */
class Inventaire_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }
    public function achat()
    {
        session_start();

        $idItem = $this->input->post("idItem");
        $quantite = $this->input->post("quantite".$idItem);
        $prix = $this->input->post("prixItem");

        $this->load->model('Utilisateur_Model', 'u');
        $this->load->model('Inventaire_Model', 'inv');

        if(($prix*$quantite) < $_SESSION['utilisateur']->gold) {
            $this->u->setGolds($_SESSION['utilisateur']->gold - ($prix*$quantite));
            $_SESSION['utilisateur']->gold = ($_SESSION['utilisateur']->gold - ($prix*$quantite));
            for($i=0; $i < $quantite; $i++) {
                $this->inv->putInInventaire($idItem);
            }
            $error = "Achat effectue !";
        } else {
            $error = "Pas assez de golds !";
        }

        $this->load->model('Item_Model', 'i');
        $this->load->model('Effet_Model', 'e');
        $this->load->model('Inventaire_Model', 'in');

        $items = $this->i->getItemInDataBase();

        foreach($items as $i) {
            $i->effets = $this->e->getEffetItem($i->id);
        }

        $inventaire = $this->in->getItemInInventaire();

        $return["items"] = $items;
        $return["inventaire"] = $inventaire;
        $return["error"] = $error;

        $this->load->view("Jeu/boutique.php",$return);
    }
}