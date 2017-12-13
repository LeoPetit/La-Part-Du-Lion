<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:22
 */
class Item_Controller extends CI_Controller
{
    public function index() {

        parent::__construct();

        $this->load->model('Item_Model', 'i');
        $result = $this->i->getItemInDataBase();
        $return["items"] = $result;
        $this->load->view("Jeu/boutique.php",$return);
    }


}