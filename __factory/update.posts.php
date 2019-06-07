<?php
session_start();

include('../__class/class.update_post.php');
// get all request
$picfile = $_FILES['post_image']['name'];
$filesize = $_FILES['post_image']['size'];
$target_directory = '../uploads/'.$picfile;
$file_temp = $_FILES['post_image']['tmp_name'];

$target_file = $target_directory.basename($picfile);
$id = $_REQUEST['id'];
$heading = $_REQUEST['post_title'];
$body = $_REQUEST['post_content'];
$category = $_REQUEST['post_category'];
$post_date = time();

if($filesize >= 2000000)
{
	$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, image size too, big.</div>";
}else{

	$createPost = new UpdatePost($id, $target_directory, $file_temp, $heading, $body, $category, $post_date);
	$createPost->updateSelectedPost();
}
?>