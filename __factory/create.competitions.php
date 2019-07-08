<?php 
	session_start();

	include('../__class/class.create_competition.php');

	// get all request
	$competition_name = $_REQUEST['competition_name'];
	$competition_location = $_REQUEST['competition_location'];
	$start_date = $_REQUEST['start_date'];
	$end_date = $_REQUEST['end_date'];

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

		$create = new CreateCompetitons($competition_name, $competition_location, $start_date, $end_date, $file_temp, $target_directory);

		$create->createNewCompetition();
	}
 ?>