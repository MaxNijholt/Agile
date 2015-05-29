<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Home extends core\Controller {
	public function index() {
		$carousel = $this->load->model('Carousel');
		$this->load->view('Home', array(
			"carousel" => $carousel->getCarousel(),
			"home" => "Dit is de eerste pagina! "
		));
	}
}