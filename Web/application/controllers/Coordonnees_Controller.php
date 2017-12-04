<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:14
 */
class Coordonnees_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('Jeu/map');
    }

    public function show()
    {
        $this->load->model('Coordonnees_Model', 'c');
        $result = $this->c->show();
        echo json_encode($result);
    }
}