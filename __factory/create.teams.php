<?php 
	session_start();

	include('../__class/class.create_team.php');

	// get all request
	$team_name = $_REQUEST['team_name'];
	$coach_name = $_REQUEST['coach_name'];
	$address = $_REQUEST['address'];
	$email = $_REQUEST['email'];
	$phone_number = $_REQUEST['phone_number'];

	// get image file
	$picfile = $_FILES['logo']['name'];
	$filesize = $_FILES['logo']['size'];
	$target_directory = '../uploads/'.$picfile;
	$file_temp = $_FILES['logo']['tmp_name'];
	$target_file = $target_directory.basename($picfile);

	if($filesize >= 2000000)
	{
		$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, image size too, big.</div>";
	}else{

		$create = new CreateTeams($team_name, $coach_name, $address, $email, $phone_number, $file_temp, $target_directory);

		$create->createNewTeam();
	}
 ?>