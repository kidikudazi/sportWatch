<?php 
include('../__config/core.php');
/**
 * get all registered teams
 */
class registeredCompetitions extends dbconnect
{
	protected $plug;
	function __construct()
	{
		# code...
		parent::__construct();

		# connect to db
		$this->plug = dbconnect::connect();
	}

	public function competitionList(){
		# query to get all registered teams
		$getList = "SELECT id,competition_name FROM competitions";
		$result = mysqli_query($this->plug, $getList);

		echo "<option value=''>--Select Team--</option>";
		while ($row = mysqli_fetch_assoc($result)) {
			# code...
			echo "<option value='".$row['id']."'>".$row['competition_name']."</option>";
		}

		exit();
	}
}

?>