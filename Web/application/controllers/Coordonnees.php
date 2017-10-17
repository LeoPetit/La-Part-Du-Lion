<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:14
 */
class Coordonnees extends CI_Controller
{

    public function index()
    {
        $this->load->model("coordonnees", "c");
        $this->load->view('map_test');
    }

    public function show()
    {
        $result = $this->c->show();
        echo json_encode($result);
    }
}