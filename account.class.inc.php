<?php
include_once 'database.class.inc.php';
class Account
{
	public static function validateResidentLoginInfo($postalCode, $houseNumber, $password)
	{
		print "yay3";
		
		$hash = password_hash($password, PASSWORD_BCRYPT);
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