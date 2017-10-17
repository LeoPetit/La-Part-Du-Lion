<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:15
 */
class Coordonnees extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function show() {
        return $this->db->get("coordonnees")->result();
    }
}