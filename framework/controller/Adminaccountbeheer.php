<?php

namespace controller;
use core;

class Adminaccountbeheer extends core\Controller {
	public function index($action = 'list') {

		switch ($action)
		{
			case 'list'		:
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
			case 'create'	:
				$this->load->view('AdminCreate');
				break;
			case 'createConfirm'	:
				$this->createAdminAccount($_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"]);
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
			case 'delete'	:
				$this->load->view('AdminDelete', array("id" => $_POST["id"]));
				break;
			case 'deleteConfirm'	:
				$this->deleteAdminAccount($_POST["id"]);
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
			case 'update'	:
				$admin = $this->getAdminAccount($_POST["id"]);
				$this->load->view('AdminUpdate', array("admin" => $admin));
				break;
			case 'updateConfirm'	:
				$this->updateAdminAccount($_POST["id"], $_POST["inputEmail"], $_POST["inputWachtwoord"], $_POST["inputVoornaam"], $_POST["inputAchternaam"]);
				$admins = $this->getAdmins();
				$this->load->view('AdminOverzicht', array("admins" => $admins));
				break;
		}
		
	}



	private function getAdminAccount($id) {
		$query = "SELECT * FROM `admin` where adminId = $id";
		$admin = $this->_db->select($query, array(), false);
		return $admin;
	}

	private function getAdmins() {
		$query = "SELECT * FROM `admin`";
		$admins = $this->_db->select($query, array(), true);
		return $admins;
	}

	private function createAdminAccount($email, $wachtwoord, $voornaam, $achternaam) {
		$query = "INSERT INTO admin(email, wachtwoord, voornaam, achternaam) VALUES ('$email', '$wachtwoord', '$voornaam', '$achternaam')";
		$this->_db->command($query);
	}

	private function deleteAdminAccount($id)
	{
		$query = "DELETE FROM admin WHERE adminId = $id";
		$this->_db->command($query);
	}

	private function updateAdminAccount($adminId, $email, $wachtwoord, $voornaam, $achternaam)
	{
		$query = "UPDATE admin SET email = '$email', wachtwoord = '$wachtwoord', voornaam = '$voornaam', achternaam = '$achternaam' WHERE adminId = $adminId";
		$this->_db->command($query);
	}

}