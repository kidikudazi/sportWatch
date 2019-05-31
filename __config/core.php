<?php
/**
* Create class for database connection
*/

class dbconnect
{
	protected $server;
	protected $servername;
	protected $serverpass;
	protected $dbname;
	
	function __construct()
	{
				$this->server = "localhost";
				$this->servername = "root";
				$this->serverpass = "";
				$this->dbname = "rage";
	}
	
	public function connect()
	{
			$conn= new mysqli($this->server, $this->servername, $this->serverpass, $this->dbname);
			
			if(!$conn)
			{
				die("connection  failed:".mysqli_error($conn));
			}
			return $conn;
	}
	
}

?>