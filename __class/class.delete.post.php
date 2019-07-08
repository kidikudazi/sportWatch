<?php 
	include("../__config/core.php");

	/**
	* Class to delete post
	*/
	class deletePost extends dbconnect
	{
		protected $plug;
		protected $post_id;
		function __construct($post_id)
		{
			# code...
			parent::__construct();

			# get db connection
			$this->plug = dbconnect::connect();

			# collect data
			$this->post_id = $post_id;
		}


		// delete single post
		public function deleteSinglePost()
		{
			# write delete query
			$deleteQuery = "DELETE FROM posts WHERE id = '".$this->post_id."' ";

			// validate if post has been deleted 
			if (mysqli_query($this->plug, $deleteQuery) === TRUE) {
				# code...
				echo("<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Post deleted successfully.</h5></div>");
				exit();
			}else{

				echo("<div class='alert alert-danger'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:white'>Sorry, an error occured.</h5></div>");
				exit();
			}
		}
	}
 ?>