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
        $this->load->view("Jeu/boutique.php");
    }
}