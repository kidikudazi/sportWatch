<?php

# registration class
include('../__class/class.register_player.php');

/* Getting file name */
$team_logo = $_FILES['image']['name'];

/* Location */
$location = "uploads/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

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
   	if(move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

	  	# form params
		$image = $location;
		$club = $_REQUEST['club'];
		$player_name = $_REQUEST['fullname'];
		$position = $_REQUEST['position'];
		$jersery = $_REQUEST['jersery'];

		# init registration
		$register = new RegisterPlayer($image, $club, $player_name, $position, $jersery);
		$register->register();

   	}else{
      echo '<span style="color: red;">Sorry, your request could not be processed.</span>';
   	}
}

?>