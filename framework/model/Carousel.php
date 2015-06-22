<?php

namespace model;
use core;

class Carousel extends core\Model {

	public function getCarousel(){
		$result = $this->_db->select("SELECT * FROM carousel ORDER BY carousel_order ASC");
		return $result;
	}

	public function updateCarousel($id,$img,$text){
		$result = $this->_db->command("UPDATE carousel SET carousel_img_url = :url , carousel_text = :txt WHERE carousel_id = :id", array(':url' => $img,':txt' => $text,':id' => $id));
		return $result;
	}

	public function updateSort($id,$order){
		$result = $this->_db->command("UPDATE carousel SET carousel_order = :order WHERE carousel_id = :id", array(':order' => $order,':id' => $id));
		return $result;
	}

	public function removeCarousel($id){
		$result = $this->_db->command("DELETE FROM carousel WHERE carousel_id = :id", array(':id' => $id));
		return $result;
	}

	public function updateImageUpload($id,$image_name){
		$result = $this->_db->command("UPDATE carousel SET carousel_img_url = :name WHERE carousel_id = :id", array(':name' => $image_name, 'id' => $id));
		return $result;

	}

	public function addCarousel(){
		
	}
}