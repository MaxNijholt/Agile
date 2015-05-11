<?php

namespace model;
use core;

class Content extends core\Model {


	private $_id = null;
	private $_name;
	private $_text;
	private $_pagid;

	public function getID(){
		return $this->_id;
	}

	public function getName(){
		return $this->_name;
	}

	public function getText(){
		return $this->_text;
	}

	public function getPage(){
		return $this->_pagid;
	}

	public function getContentCategories(){
		return "null";
	}

	public function getContentbyPage($pageID){
		$result = $this->_db->select("SELECT * FROM `content-change` WHERE cont_id = '".$pageID."'");
		/*foreach ($variable as $key) {
			return $pageID;
		}*/
		return $result;
	}

	public function getContentByID($cont_id){
		$result = $this->_db->select("SELECT * FROM `content-change` INNER JOIN (SELECT cont_id as ID, MAX(cont_change_date) as TopDate FROM `content-change` GROUP BY cont_id) as item ON item.TopDate = cont_change_date AND item.ID = cont_id WHERE cont_id = '$cont_id'");
		return $result;
	}

	public function getContent($cont_id = null){
		if ($cont_id != null){
			$where = " WHERE `content-change`.cont_id = '$cont_id' ";
		}
		else
		{
			$where = " ";
		}

		$result = $this->_db->select("SELECT `content-change`.cont_id, cont_title, cont_text,cont_change_date,author,page.pag_title FROM `content-change` INNER JOIN content ON `content-change`.cont_id = content.cont_id INNER JOIN page ON content.pag_id = page.pag_id INNER JOIN (SELECT cont_id, MAX(cont_change_date) as TopDate FROM `content-change` GROUP BY cont_id) AS history_item ON history_item.TopDate = cont_change_date AND history_item.cont_id = `content-change`.cont_id".$where."GROUP BY content.cont_id");
		return $result;
	}


	public function updateContent($cont_id,$cont_title,$cont_text,$cont_author){
		if(false !== ($result = $this->_db->select("SELECT cont_title FROM `content-change` WHERE cont_title = :title AND cont_id != :id", array(':title' => $cont_title,':id' => $cont_id)))){
			return "Title already exsists";
		}
		if(false !== ($result = $this->_db->select("SELECT cont_text FROM `content-change` WHERE cont_text = :ct_text AND cont_id != :id", array(':ct_text' => $cont_title,':id' => $cont_id)))){
			return "Content already exsists";
		}
		if(false !== ($test = $this->_db->select("SELECT cont_text FROM `content-change` WHERE cont_text = :ct_text AND cont_title = :title", array(':ct_text' => $cont_text,':title' => $cont_title)))){
			return "Content already exsists";
		}
		else{
			date_default_timezone_set("Europe/Amsterdam");
			$update_result = $this->_db->command("INSERT INTO `content-change` (cont_id,cont_title,cont_text,cont_change_date,author) VALUES (:id,:title,:cont_txt,'".date("Y-m-d H:i:s")."','$cont_author')", array(':id' => $cont_id,':title' => $cont_title,':cont_txt' => $cont_text));
			return $update_result;
		}
	}

	public function insertContent($pag_id,$cont_title,$cont_content,$content_author){
		if(false !== ($result = $this->_db->select("SELECT cont_title FROM `content-change` as ch INNER JOIN content ON content.cont_id = ch.cont_id WHERE content.pag_id = :id AND cont_title = :title", array(':id' => $pag_id,':title' => $cont_title)))){
			return "Content under this title already exsists";
		}
		else{
			date_default_timezone_set("Europe/Amsterdam");
			$insert_result_content = $this->_db->command("INSERT INTO content (pag_id) VALUES ('$pag_id')");
			$select_result = $this->_db->select("SELECT cont_id FROM content ORDER BY cont_id DESC LIMIT 1;");
			foreach ($select_result as $value) {
				$cont_id = $value;
			}
			$insert_result = $this->_db->command("INSERT INTO `content-change` (cont_id,cont_title,cont_text,cont_change_date,author) VALUES ('$cont_id','$cont_title','$cont_content','".date("Y-m-d H:i:s")."','$content_author')");
			return $cont_id;
		}
	}
}

class Content_cat extends core\Model{

	private $_catID;
	private $_name;
	private $_desc;


	public function getCatID(){
		return $this->_catID;
	}

	public function getName(){
		return $this->_name;
	}

	public function getDescription(){
		return $this->_desc;
	}

	public function getContentCategories(){
		$query = "SELECT * FROM content-category";

		$categories = $this->_db->select($query, array(), true);

		return $categories;
	}
}