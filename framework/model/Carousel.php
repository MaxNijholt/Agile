<?php

namespace model;
use core;

class Carousel extends core\Model {

	public function getCarousel(){
		$result = $this->_db->select("SELECT * FROM carousel");
		return $result;
	}

	public function updateCarousel(){

	}

	public function removeCarousel(){

	}

	public function addCarousel(){
		
	}
}