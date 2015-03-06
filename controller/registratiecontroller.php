
<?php
include 'Singleton.php';
include 'Database.php';

class registratiecontroller {

	public function validateForm() {

		//Maak de database connectie en plaats de resultaten van de opgegeven query in een array
		//
		//
		$database = new tool\Database();
		$database->connect('localhost', 'toine.tjosti.nl', 'root', 'Tjosti2015@Mysql');

		$postalCodes = $database->select("SELECT postcode, huisnummer FROM `postcode-check` WHERE postcode = :postcode;", array(
			':postcode' => $_POST['inputPostalCode']
		));
		$database->close();

		// Controlleer de ingevulde gegevens
		// 
		//
		//echo '<pre>';
		//print_r($postalCodes);
		
		//echo $_POST['inputHomeNumber'];

		if (is_null($postalCodes[0])) {
			echo "Ik heb geen postcodes gevonden die overeenkomen!";
		}
		else{
			echo "Ik heb postcodes gevonden die overeenkomen";

			foreach ($postalCodes as $key => $value) {
				//print_r($postalCodes);
				if ($value['huisnummer'] !== $_POST['inputHomeNumber']) {
				}
				else{
					if ($_POST['inputEmail'] === $_POST['inputEmailConfirm']) {
						echo "<br />";
						echo "Alles is in orde je kan registreren";
					}

				}
			}
		}
	}

	
}

$test = new registratiecontroller();
$test->validateForm();
	
	
?>