<?php
include 'database.class.inc.php';
class Account
{
	
	public static function validateLoginInfo($postalCode, $houseNumber, $password)
	{

		$db = new Database("tjostilocal");

		$result = $db->doSql("select * from account where postcode = postalCode && huisnummer = $houseNumber && wachtwoord = $password");

		$account = $result->fetch_object();

		echo $account->postcode;

	}
}

?>