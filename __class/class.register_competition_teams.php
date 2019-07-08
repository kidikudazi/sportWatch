<?php 
include('../__config/core.php');
/**
 * register competition teams
 */
class RegisterCompetitionTeam extends dbconnect
{
	protected $plug;
	protected $team_id;
	protected $competition;

	function __construct($team_id, $competition)
	{
		# code...
		parent::__construct();

		#db connection
		$this->plug = dbconnect::connect();

		#data
		$this->team_id = $team_id;
		$this->competition = $competition;
	}

	// register team to competition
	public function register()
	{
		// validate id team has alreadyb been registered to competition;
		$validateRegistration = "SELECT * FROM competition_teams WHERE team_id ='".$this->team_id."' AND competition_id = '".$this->competition."' ";
		$result = mysqli_query($this->plug, $validateRegistration);

		$outputResult = mysqli_num_rows($result);

		if($outputResult > 0)
		{
			$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, duplicate record is not allowed.</div>";
			header('Location:../admin/competition_teams.php');
		}else{
			# save record 
			$saveData = "INSERT INTO competition_teams (team_id, competition_id) VALUES ('".$this->team_id."', '".$this->competition."') ";

			if(mysqli_query($this->plug, $saveData) === TRUE){
				$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Registration Successful.</h5></div>";

				header('Location:../admin/competition_teams.php');
			}else{
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, an error occurred.</div>";
				header('Location:../admin/competition_teams.php');
			}
		}
	}
}
?>