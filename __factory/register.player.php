<?php 
	session_start();

	include('../__class/class.register_player.php');

	// get all request
	$team_id = $_REQUEST['team_name'];
	$player_name = $_REQUEST['player_name'];
	$player_position = $_REQUEST['playing_position'];
	$jersey_number = $_REQUEST['jersey_number'];

	// get image file
	$picfile = $_FILES['picture']['name'];
	$filesize = $_FILES['picture']['size'];
	$target_directory = '../uploads/'.$picfile;
	$file_temp = $_FILES['picture']['tmp_name'];
	$target_file = $target_directory.basename($picfile);
	if($filesize >= 2000000)
	{
		$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, image size too, big.</div>";
	}else{

		$create = new RegisterPlayer($team_id, $player_name, $player_position, $jersey_number, $file_temp, $target_directory);

		$create->register();
	}
?>