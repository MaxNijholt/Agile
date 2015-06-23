<?php
/**
 * Created by PhpStorm.
 * User: toinebakkeren
 * Date: 22/06/15
 * Time: 11:02
 */

namespace controller;
use core;

class Footerbeheer extends core\Controller {
    public function index() {
        $this->load->view('Footerbeheer', array (
            "currentData" => $this->getCurrentData()
        ), [], "admin");
    }

    public function post() {
        $json = json_decode(file_get_contents('php://input'));
        $links = $json[0];
        $middel = $json[1];
        $rechts = $json[2];

        $query = "UPDATE footer SET col1='{$links}',col2='{$middel}',col3='{$rechts}' WHERE id = '1';";
        $this->_db->command($query);
    }

    private function getCurrentData() {
        $query = "SELECT * FROM footer WHERE id = 1";
        $result = $this->_db->select($query);

        return $result;
    }
}