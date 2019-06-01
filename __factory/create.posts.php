<?php
include('../__class/class.create_post.php');
// get all request
$picfile = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
$target_directory = '../uploads/'.$picfile;
$file_temp = $_FILES['file']['tmp_name'];

$target_directory = $target_directory.basename($picfile);

$heading = $_REQUEST['header'];
$body = $_REQUEST['body'];
$category = $_REQUEST['category'];
$post_date = time();

if($filesize >= 2000000)
{
	echo "<h4 style='color:red'>Sorry, image size too, big.</h4>";
}else{

	$createPost = new CreatePost($target_directory, $file_temp, $heading, $body, $category, $post_date);
	$createPost->newPost();
}
?>