<?php
include_once 'database.class.inc.php';
class Account
{
	public static function validateResidentLoginInfo($postalCode, $houseNumber, $password)
	{
		// Zet het wachtwoord om in een hash die ook in de database wordt opgeslagen
		
		$encryptedpass = crypt($password);

		// Maak een database connectie

		try {
			$database = new Database("tjostilocal");
			
		}
		catch {
			throw new Exception("Help mijn database is kapot!", 1);
			
		}

		/*$db = new Database("tjostilocal");
echo "yay2";
		$result = $db->doSql("SELECT * from inwoners WHERE (postcode = $postalCode AND huisnummer = $houseNumber AND wachtwoord = $hash");
		//result vol?
		$account = $result->fetch_assoc();
		echo "yay";
		echo $account->postcode;*/
	}


	public static function validateAdminLoginInfo($value='')
	{
		# code...
	}
}

?>