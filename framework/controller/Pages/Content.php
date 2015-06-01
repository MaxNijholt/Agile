<?php


namespace controller;


class Content {

	public function index($id) {
		print_r($id);
		$page = $this->_db->select("SELECT cont_title, cont_text FROM content as `a` JOIN `content-change` as `b` ON a.cont_id = b.cont_id WHERE pag_id = :id LIMIT 1 ORDER BY cont_change_date DESC;", array(
			':id'
		));

		$this->load->view('Pages/Content', array(
			'fout' => "Deze pagina bestaat niet."
		));
	}

}