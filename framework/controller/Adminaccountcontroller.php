<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;


class Adminaccountcontroller extends core\Controller {

	public function index() {

		//$accounts = $this->load->model('AdminAccount');
		$accounts = AdminAccount::getAdminAccounts();

		$this->load->view('AdminAccountView/overzicht', array(
			"admins" => $accounts));
		//echo $account["voornaam"];

	}


}