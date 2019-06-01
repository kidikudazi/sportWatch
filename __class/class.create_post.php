<?php
include("../__config/core.php");
/**
* create new post class
*/

class CreatePost extends dbconnect
{
	protected $plug;
	protected $target_directory;
	protected $file_temp;
	protected $heading;
	protected $body;
	protected $category;
	protected $post_date;

	function __construct($target_directory, $file_temp, $heading, $body, $category, $post_date)
	{
		# parent construct...
		parent::__construct();

		# link database connection
		$this->plug = dbconnect::connect();

		# collect data
		$this->target_directory = $target_directory;
		$this->file_temp = $file_temp;
		$this->heading = $heading;
		$this->body = $body;
		$this->category = $category;
		$this->post_date = $post_date;
	}

	public function newPost()
	{
		// insert values into the database
		$createPost = "INSERT INTO posts (post_image, heading, body, category, post_date)";
		$createPost .= "VALUES ('".$this->target_directory."', '".$this->heading."', '".$this->body."', '".$this->category."', '".$this->post_date."')";
		if(mysql_query($this->plug, $createPost) === TRUE)
		{
			// move files to folder
			move_uploaded_file($this->file_temp, $this->target_directory);
			echo "<h5 style='color:green'>Post created successfully.</h5>";
		}else{

			echo "<h2 style='color:red'>Sorry, an error occurred.</h2>";
		}
	}
}

?>