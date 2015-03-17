<?php
include '../database.class.inc.php';
class AdminAccount
{
	private $adminId;
	private $email;
	private $password;
	private $voornaam;
	private $achternaam;

	public function __construct()
	{
		
	}
	
	public static function getAdminAccounts()
	{
		try {
			$database = new Database("toine.tjosti.nl");
		}
		catch (Exception $e ) {
			throw new Exception("Help mijn database is kapot!", 1);
		}
		
		$result = $database->doSql("select * from admin");
		$admins = array();
		
		while ($obj = $result->fetch_object())
		{
			$admins[] = $obj;
		}
		
		return $admins;
	}

	public static function getAdminAccount($id)
	{
		try {
			$database = new Database("toine.tjosti.nl");			
		}
		catch (Exception $e ) {
			throw new Exception("Help mijn database is kapot!", 1);
		}

		$result = $database->doSql("select * from admin where adminId = $id");
		$obj = $result->fetch_object();
		return $obj;
	}
	

	public static function createAdminAccount($email, $wachtwoord, $voornaam, $achternaam)
	{
		try {
			$database = new Database("toine.tjosti.nl");
		}
		catch (Exception $e ) {
			throw new Exception("Help mijn database is kapot!", 1);
		}
		
		$database->doSql("insert into admin(email, wachtwoord, voornaam, achternaam) values ('$email', '$wachtwoord', '$voornaam', '$achternaam')");
	}
	

	public static function deleteAdminAccount($id)
	{
		try {
			$database = new Database("toine.tjosti.nl");
		}
		catch (Exception $e ) {
			throw new Exception("Help mijn database is kapot!", 1);
		}
		
		$database->doSql("delete from admin where adminId = $id");
	}
	

	public static function updateAdminAccount($adminId, $email, $wachtwoord, $voornaam, $achternaam)
	{
		try {
			$database = new Database("toine.tjosti.nl");
		}
		catch (Exception $e ) {
			throw new Exception("Help mijn database is kapot!", 1);
		}
		
		$database->doSql("update admin set email = '$email', wachtwoord = '$wachtwoord', voornaam = '$voornaam', achternaam = '$achternaam' where adminId = $adminId");
	}
	
	
	
	
	///GETTERS///
	
	public function getAdminId()
	{
		return $this->adminId;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function getVoornaam()
	{
		return $this->voornaam;
	}
	
	public function getAchternaam()
	{
		return $this->achternaam;
	}
	
	///SETTERS///
	
	public function setEmail($email)
	{
		$this->email = $email;
	}
	
	public function setVoornaam($voornaam)
	{
		$this->email = $email;
	}
	
	public function setAchternaam($achternaam)
	{
		$this->email = $email;
	}


}
?>