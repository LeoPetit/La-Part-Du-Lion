<?php

/**
 * Created by PhpStorm.
 * User: jérémy renaud
 * Date: 24/01/2018
 * Time: 17:03
 */
class Commentaire_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->view('Forum/topics.php');
    }

    public function subject(){
        $this->load->helper(array('form', 'url'));

        $this->load->view('Forum/forum.php');
    }
}