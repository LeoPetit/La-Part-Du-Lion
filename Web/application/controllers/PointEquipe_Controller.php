<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:23
 */
class PointEquipe_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function classement()
    {
        $id = $this->input->post("polygonId");
        $this->load->model('PointEquipe_Model', 'pe');
        $result = $this->pe->classementQuartier($id);

        echo json_encode($result);
    }

}