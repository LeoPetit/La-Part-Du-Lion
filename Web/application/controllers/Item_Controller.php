<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:22
 */
class Item_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index() {

        session_start();

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

        $this->load->view("Jeu/boutique.php",$return);
    }


}