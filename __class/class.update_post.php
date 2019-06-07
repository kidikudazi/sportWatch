<?php
session_start();

include("../__config/core.php");
/**
* create new post class
*/

class UpdatePost extends dbconnect
{
	protected $plug;
	protected $id;
	protected $target_directory;
	protected $file_temp;
	protected $heading;
	protected $body;
	protected $category;
	protected $post_date;

	function __construct($id, $target_directory, $file_temp, $heading, $body, $category, $post_date)
	{
		# parent construct...
		parent::__construct();

		# link database connection
		$this->plug = dbconnect::connect();

		# collect data
		$this->id = $id;
		$this->target_directory = $target_directory;
		$this->file_temp = $file_temp;
		$this->heading = $heading;
		$this->body = $body;
		$this->category = $category;
		$this->post_date = $post_date;
	}

	public function updateSelectedPost()
	{
		// update post values into the database
		$updateRecord = "UPDATE posts SET heading= '".$this->heading."', body= '".$this->body."', category= '".$this->category."', post_image= '".$this->target_directory."', post_date= '".$this->post_date."' WHERE id= '".$this->id."' ";
		if(mysqli_query($this->plug, $updateRecord) === TRUE)
		{
			// move files to folder
			move_uploaded_file($this->file_temp, $this->target_directory);
			$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Post updated successfully.</h5></div>";

			header('Location:../admin/home.php');
		}else{

			$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h6 style='color:red'>Sorry, an error occurred.</h6></div>";
			header('Location:../admin/home.php');
		}
	}
}

?>