<?php

# registration class
include('../__class/class.register_team.php');

/* Getting file name */
$team_logo = $_FILES['logo']['name'];

/* Location */
$location = "upload/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");

/* Check file extension */
if( !in_array(strtolower($imageFileType), $valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0) {

	echo '<span style="color: red;">Sorry, image upload failed.</span>';
}else{
   /* Upload file */
   	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)) {
	  echo $location;

	  	# form params
		$team_logo = $location;
		$team_name = $_REQUEST['team_name'];
		$coach_name = $_REQUEST['coach_name'];
		$address = $_REQUEST['address'];
		$phone = $_REQUEST['phone'];
		$email = $_REQUEST['email'];

		# init registration
		$register = new RegisterTeam();
		$register->register();
   	}else{
      echo '<span style="color: red;">Sorry, your request could not be processed.</span>';
   	}
}

?>