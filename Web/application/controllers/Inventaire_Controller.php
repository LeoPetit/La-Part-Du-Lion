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
        $idItem = $this->input->post("idItem");

        $quantite = $this->input->post("quantite".$idItem);


    }
}