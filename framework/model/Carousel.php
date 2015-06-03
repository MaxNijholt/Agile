<?php



namespace model;
use core;

class Carousel extends core\Model {

	public function getCarousel(){
		$result = $this->_db->select("SELECT * FROM carousel");
		return $result;
	}

	public function updateCarousel($id,$img,$text){
		$result = $this->_db->command("UPDATE carousel SET carousel_img_url = :url , carousel_text = :txt WHERE carousel_id = :id", array(':url' => $img,':txt' => $text,':id' => $id));
		return $result;
	}

	public function removeCarousel(){

	}

	public function addCarousel(){
		
	}
}