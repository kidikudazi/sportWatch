<?php 
include("../__class/class.delete.post.php");
// collect post id
$post_id = $_REQUEST['post_id'];

// validate if post is empty
if(empty($post_id))
{
	echo("<div class='alert alert-danger'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Invalid Request.</h5></div>");
	exit();
}else{
	
	

	$delete = new deletePost($post_id);

	$delete->deleteSinglePost();
}

exit();
 ?>