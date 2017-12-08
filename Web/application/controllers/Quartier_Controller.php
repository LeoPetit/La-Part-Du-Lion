<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:23
 */
class Quartier_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function info()
    {
        $id = $this->input->post("polygonId");
        $this->load->model('Quartier_Model', 'q');
        $result = $this->q->infoQuartier($id);

        echo json_encode($result);
    }

    public function classement()
    {
        $id = $this->input->post("polygonId");
        $this->load->model('Quartier_Model', 'q');
        $result = $this->q->classementQuartier($id);

        echo json_encode($result);
    }
}