<?php 
	session_start();

	include('../__class/class.update_competition.php');

	// get all request
	$id = $_REQUEST['id'];
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

		$update = new UpdateCompetitons($id, $competition_name, $competition_location, $start_date, $end_date, $file_temp, $target_directory);

		$update->updateSelectedCompetition();
	}
?>