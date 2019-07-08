<?php 
include('../__config/core.php');
/**
 * get all registered teams
 */
class registeredTeams extends dbconnect
{
	protected $plug;
	function __construct()
	{
		# code...
		parent::__construct();

		# connect to db
		$this->plug = dbconnect::connect();
	}

	public function teamList(){
		# query to get all registered teams
		$getTeams = "SELECT id,team_name FROM teams";
		$result = mysqli_query($this->plug, $getTeams);

		echo "<option value=''>--Select Team--</option>";
		while ($row = mysqli_fetch_assoc($result)) {
			# code...
			echo "<option value='".$row['id']."'>".$row['team_name']."</option>";
		}

		exit();
	}
}

?>