<?php 

	session_start();

	include('../__class/class.update_competition_teams.php');

	// get all request
	$id = $_REQUEST['id'];
	$team_id = $_REQUEST['team_name'];
	$competition = $_REQUEST['competition'];
	
	$update = new UpdateCompetitionTeam($id, $team_id, $competition);

	$update->updateRecord();
?>