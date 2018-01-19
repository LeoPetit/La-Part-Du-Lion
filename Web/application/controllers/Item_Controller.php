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

        $this->load->model('Item_Model', 'i');
        $this->load->model('Effet_Model', 'e');
        $items = $this->i->getItemInDataBase();

        foreach($items as $i) {
            $i->effets = $this->e->getEffetItem($i->id);
        }

        $return["items"] = $items;
        $this->load->view("Jeu/boutique.php",$return);
    }


}