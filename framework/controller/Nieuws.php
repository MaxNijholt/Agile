<?php

namespace controller;
use core;

class Nieuws extends core\Controller {
	public function index() {
		$this->load->view('Nieuws', array(
			"home" => "Dit is de eerste pagina!! ",
            "comments" => $this->getComments(1)
		));
	}

    public function getComments($contentID) {
        $reactieModel = $this->load->model('Reactie');
        return $reactieModel->getComments($contentID);
    }
}