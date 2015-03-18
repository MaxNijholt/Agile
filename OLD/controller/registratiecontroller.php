
<?php
header('http://toine.tjosti.nl/index.php');

include 'Singleton.php';
include 'Database.php';


class registratiecontroller {

	private $test = 'register';

	public function validateForm() {
		$huisnummerfalse;


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
			// postcode klopt niet
			echo '<script type="text/javascript">
           	window.location = "http://toine.tjosti.nl/registreren.php?error=postcode"
      		</script>';
		}
		else{
			foreach ($postalCodes as $key => $value) {
				// postcode klopt wel
				//print_r($postalCodes);
				if ($value['huisnummer'] !== $_POST['inputHomeNumber']) {
					$huisnummerfalse = 'true';
				}
				else{
					//echo "<br />huisnummer";
					if ($_POST['inputEmail'] === $_POST['inputEmailConfirm']) {
						$this->registerUser();
					}
					else{
						echo '<script type="text/javascript">
           				window.location = "http://toine.tjosti.nl/registreren.php?error=email"
      					</script>';
					}

				}
			}
		}

		if ($huisnummerfalse === 'true') {
			echo '<script type="text/javascript">
           	window.location = "http://toine.tjosti.nl/registreren.php?error=huisnummer"
      		</script>';
		}
	}

	private function registerUser() {
		$encryptedPass = crypt($_POST['inputPassword']);
		$postcode = $_POST['inputPostalCode'];
		$huisnummer = $_POST['inputHomeNumber'];
		$email = $_POST['inputEmail'];

		//Maak de database connectie en plaats de resultaten van de opgegeven query in een array
		//
		//
		$database = new tool\Database();
		$database->connect('localhost', 'toine.tjosti.nl', 'root', 'Tjosti2015@Mysql');

		$postalCodes = $database->command("INSERT INTO users (postcode, huisnummer, email, wachtwoord)
			VALUES ('$postcode', '$huisnummer', '$email', '$encryptedPass')");
		$database->close();

		echo '<script type="text/javascript">
           window.location = "http://toine.tjosti.nl/registrationsuccess.php"
      	</script>';

	}	
}

$test = new registratiecontroller();
$test->validateForm();
?>