<?php

/**
 * Created by PhpStorm.
 * User: leo
 * Date: 29/11/17
 * Time: 09:23
 */
class Quartier_Controller extends CI_Controller
{
    public function info()
    {
        $id = $this->input->post("polygon.indexID");
        $this->load->model('Quartier_Model', 'c');
        $result = $this->c->infoQuartier($id);
        echo json_encode($result);
    }
}