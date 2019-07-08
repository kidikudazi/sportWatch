<?php 

	session_start();

	include('../__class/class.register_competition_teams.php');

	// get all request
	$team_id = $_REQUEST['team_name'];
	$competition = $_REQUEST['competition'];
	
	$create = new RegisterCompetitionTeam($team_id, $competition);

	$create->register();
?>