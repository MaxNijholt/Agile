<?php 

class Database
{
	
	private $connection;
	private $result;
	protected $location = "localhost";
	protected $login = "root";
	protected $password = "Tjosti2015@Mysql";
	protected $database = "toine.tjosti.nl";
	
	
	public function __construct($input_db)
	{
		//$conn = new mysqli($GLOBALS["location"], $GLOBALS["login"], $GLOBALS["password"]);
		//$conn = new mysqli($this->location, $this->login, $this->password, $database);
		include('config.inc.php');
		//$this->connection = new mysqli($database["location"], $database["login"], $database["password"], $input_db);
		$this->connection = new mysqli($this->location, $this->login, $this->password, $this->database);
		if ($this->connection->connect_errno != 0)
		{
			die("Probleem bij het leggen van connectie of selecteren van database");
		}
	}
	
	public function doSQL($sql)
	{
		$this->result = $this->connection->query($sql)
			or die($this->connection->error.__LINE__);
			
		return $this->result;
	}
	
	public function getRecord()
	{
		return $this->result->fetch_assoc();
	}
	
	public function __destruct()
	{
		//$this->result->close();
		$this->connection->close();
	}

}
?>