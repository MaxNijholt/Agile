<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;

class Carouselbeheer extends core\Controller {
	public function index($action = 'carousel') {

		if (!isset($_SESSION["adminUsername"]))
                {
                        header("location: /Adminlogin");
                }

        if ($action === 'carousel') {
        	$carousel = $this->load->model("Carousel");
        	$this->load->view('Carouselbeheer', array(
        		"carousel" => $carousel->getCarousel(),
				"message" => "page load"
			), array(
				'js' => array('/js/tinymce/tinymce.min.js','/js/tinymce-load.js','/js/file_upload.js'),
				'css' => array('/css/carouselbeheer.css')
			));
        }
	}
}
