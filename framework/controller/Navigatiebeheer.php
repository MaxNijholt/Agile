<?php
/**
 * @author Roel Ernens   info@roelernens.nl
 * @author Stephan Römer info@stephanromer.nl
 */
namespace controller;
use core;
class Navigatiebeheer extends core\Controller {

	private function getPostalCodes($start) {
		$query = "SELECT * FROM `postcode-check` ORDER BY postcode, huisnummer ASC LIMIT :start, 20;";
		$postalCodes = $this->_db->select($query,array(
			':start' => $start
			),true);
		return $postalCodes;
		//echo "<pre>";
		//print_r($postalCodes);
	}
	private function removePostalCode() {
		$query = "DELETE FROM `postcode-check` WHERE postcode = '" . $_POST['confirmedPostcode'] . "' AND huisnummer = '" . $_POST['confirmedHuisnummer'] . "';";
		try {
			$this->_db->command($query);
			return 'success';
		} catch (Exception $e) {
			return 'error';
		}
	}
	private function editPostalCode() {
		$query = "
			UPDATE `postcode-check` 
			SET postcode='" . $_POST['desiredPostcode'] . "', huisnummer='" . $_POST['desiredHuisnummer'] . "' 
			WHERE postcode='" . $_POST['originalPostcode'] . "' AND huisnummer='" . $_POST['originalHuisnummer'] . "';";
		
		try {
			$this->_db->command($query);
			return 'editsuccess';
		} catch (Exception $e) {
			return 'editerror';
		}
	}
	private function createPostalCode() {
		$query = "INSERT INTO `postcode-check` VALUES ('" . $_POST['creatingPostcode'] . "','" . $_POST['creatingHuisnummer'] . "');";
		$checkQuery = "SELECT * FROM `postcode-check` WHERE postcode='" . $_POST['creatingPostcode'] . "' AND huisnummer='" . $_POST['creatingHuisnummer'] . "';";
		
		$checkResult = $this->_db->select($checkQuery);
		if (is_null($checkResult)) {
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