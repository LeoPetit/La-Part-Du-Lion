<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 17/10/17
 * Time: 09:14
 */
class Topic_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->model('Topic_Model', 't');

        $data = $this->t->getAllTopics($_SESSION["utilisateur"]->equipe_id);

        $this->load->view('Forum/topics.php',$data);
    }

    public function subject(){
        $this->load->helper(array('form', 'url'));

        $this->load->view('Forum/forum.php');
    }
}