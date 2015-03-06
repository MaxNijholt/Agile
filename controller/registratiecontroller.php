<?php
include 'Singleton.php';
include 'Database.php';

class registratiecontroller {
	public function validateForm() {
		$database = new tool\Database();
		$database->connect('localhost', 'toine.tjosti.nl', 'root', 'Tjosti2015@Mysql');
		$postalCodes = new array();

		$postalCodes = $database->select("SELECT postcode FROM `postcode-check` WHERE postcode = :postcode;", array(
			':postcode' => $_POST['inputPostalCode']
		));
		echo '<pre>';
		print_r($postalCodes);
		
		if 
		//foreach ($postalCodes as $key => $value) {
		//	var_dump($value['postcode']);
		//}
		//if ($_POST['inputPostalCode']) {	
		//}

		$database->close();
	}
}

$test = new registratiecontroller();
$test->validateForm();
	
	
?>