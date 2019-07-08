<?php 
include("../__class/class.delete.player.php");
// collect post id
$id = $_REQUEST['id'];

// validate if post is empty
if(empty($id))
{
	echo("<div class='alert alert-danger'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Invalid Request.</h5></div>");
	exit();
}else{
	
	$delete = new deletePlayer($id);

	$delete->deleteSinglePlayer();
}

exit();
 ?>