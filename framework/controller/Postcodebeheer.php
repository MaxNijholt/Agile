<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */

namespace controller;
use core;

class Postcodebeheer extends core\Controller {
	public function index() {

		if (!isset($_SESSION["adminUsername"]))
                {
                        header("location: /Adminlogin");
                }

		header('Location: /postcodebeheer/listing');
	}

    public function listing($page = '0', $sorting = '0', $search = '0') {
    	if (isset($_POST['search'])) {
    		$search = $_POST['search'];
    	}
    	$next = $page + 1;
    	$previous = $page - 1;
        $this->load->view('Postcodebeheer', array(
            "resultset" => $this->getPostalCodes($page * 20, $sorting, $search),
            "next" => $page + 1,
            "currentPage" => $page,
            "currentSearch" => $search,
            "nextURL" => "/postcodebeheer/listing/{$next}/{$sorting}/{$search}",
            "sortingActive" => $sorting,
            "previousURL" => "/postcodebeheer/listing/{$previous}/{$sorting}/{$search}",
            "message" => '',
            "url" => "/postcodebeheer/listing/{$page}/{$sorting}/{$search}"
        ));
}

	public function delete() {
		$this->load->view('confirmPostalcodeDeletion', array(
				"postcodedelete" => $_POST['checkbox']
				));
	}

	public function edit($postcode, $huisnummer) {
		$this->load->view('EditPostalCode', array(
			"postcodeedit" => $postcode,
			"huisnummeredit" => $huisnummer
			));
	}

	public function editconfirmed() {
		if ($this->editPostalCode($_POST['desiredPostcode'], $_POST['desiredHuisnummer']) === 'editsuccess') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres is succesvol aangepast.'
				));
			}
			else {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Er is iets fout gegaan tijdens het aanpassen.'
				));
			}
	}

	public function create() {
		$this->load->view('NewPostalCode');
	}

	public function created() {
		$creationStatus = $this->createPostalCode($_POST['creatingPostcode'], $_POST['creatingHuisnummer']);
			if ( $creationStatus === 'createsuccess') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres is succesvol aangemaakt.',
				"url" => '/postcodebeheer/listing/'
				));
			}
			if ($creationStatus === 'createerror') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Er is iets fout gegaan tijdens het aanmaken.',
				"url" => '/postcodebeheer/listing/'
				));
			}
			if ($creationStatus === 'existingerror') {
				$this->load->view('Postcodebeheer', array(
				"resultset" => $this->getPostalCodes($start * 20),
				"next" => $start + 1,
				"message" => 'Het adres dat je wilt aanmaken bestaat al.',
				"url" => '/postcodebeheer/listing/'
				));
			}
	}


	public function confirmed() {
		$postcodes = unserialize($_POST['confirmedPostcodes']);
		foreach ($postcodes as $postcode => $value) {
			$postcodehuisnummer = explode('-', $postcode);
			$this->removePostalCode($postcodehuisnummer[0], $postcodehuisnummer[1]);
		}
		header('Location: /postcodebeheer/listing');
	}

	private function getPostalCodes($start, $sorting, $search) {
		if($search != '0') {
			$query = "SELECT * FROM `postcode-check` WHERE postcode LIKE :search  ORDER BY postcode, huisnummer ASC LIMIT :start, 20;";
			$postalCodes = $this->_db->select($query,array(
				':start' => $start,
				':search' => '%' . $search . '%'
			),true);
			//var_dump($postalCodes);
			return $postalCodes;

			//echo "<pre>";
			//print_r($postalCodes);
		}
		elseif ($sorting != '0') {
			$query = "SELECT * FROM `postcode-check` ORDER BY {$sorting} LIMIT :start, 20;";
			$postalCodes = $this->_db->select($query,array(
			':start' => $start
			),true);
			return $postalCodes;
		}
		else {
			$query = "SELECT * FROM `postcode-check` ORDER BY postcode, huisnummer ASC LIMIT :start, 20;";
			$postalCodes = $this->_db->select($query,array(
			':start' => $start
			),true);
			return $postalCodes;
			//echo "<pre>";
			//print_r($postalCodes);
		}
	}

	private function removePostalCode($confirmedPostcode, $confirmedHuisnummer) {
		$query = "DELETE FROM `postcode-check` WHERE postcode = '" . $confirmedPostcode . "' AND huisnummer = '" . $confirmedHuisnummer . "';";
		try {
			$this->_db->command($query);
			return 'success';
		} catch (Exception $e) {
			return 'error';
		}
	}

	private function editPostalCode() {

		$desiredPostcode = str_replace(' ', '', $_POST['desiredPostcode']);
		$originalPostcode = str_replace(' ', '', $_POST['originalPostcode']);
		$desiredHuisnummer = str_replace(' ', '', $_POST['desiredHuisnummer']);
		$originalHuisnummer = str_replace(' ', '', $_POST['originalHuisnummer']);

		if(strlen($desiredPostcode) != 6 || strlen($originalPostcode) != 6) {
			return 'editerror';
		}

		$query = "
			UPDATE `postcode-check` 
			SET postcode='" . $desiredPostcode . "', huisnummer='" . $desiredHuisnummer . "' 
			WHERE postcode='" . $originalPostcode . "' AND huisnummer='" . $originalHuisnummer . "';";
		
		try {
			$this->_db->command($query);
			return 'editsuccess';
		} catch (Exception $e) {
			return 'editerror';
		}
	}

	private function createPostalCode() {

		$postalcode = str_replace(' ', '', $_POST['creatingPostcode']);
		$huisnr = str_replace(' ', '', $_POST['creatingHuisnummer']);

		if(strlen($postalcode) != 6) {
			return 'createerror';
		}

		$query = "INSERT INTO `postcode-check` VALUES ('" . $postalcode . "','" . $huisnr . "');";
		$checkQuery = "SELECT * FROM `postcode-check` WHERE postcode='" . $postalcode . "' AND huisnummer='" . $huisnr . "';";
		
		$checkResult = $this->_db->select($checkQuery);

		if (is_null($checkResult['postcode'])) {
			try {
			$this->_db->command($query);
			return 'createsuccess';
			} catch (Exception $e) {
			return 'createerror';
			}
		}
		else {
			return 'existingerror';
		}
		
	}
}
