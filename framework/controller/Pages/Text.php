<?php


namespace controller\Pages;
use core;


class Text extends core\Controller {

	public function index($id) {

		$page = $this->_db->select(
			"SELECT 
				cont_title, 
				cont_text 
			FROM
				content as `a` 
			JOIN 
				`content-change` as `b` ON a.cont_id = b.cont_id 
			WHERE 
				pag_id = :id 
			ORDER BY
				cont_change_date DESC
			LIMIT 
				1;", array(
			':id' => $id
		));

		echo '<pre>';
		print_r($page);
		echo '</pre>';

		$this->load->view('Pages/Text', array(
		 	'fout' => "Deze pagina bestaat niet."
		));
	}
}