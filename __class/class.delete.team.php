<?php 
	include("../__config/core.php");

	/**
	* Class to delete post
	*/
	class deleteTeam extends dbconnect
	{
		protected $plug;
		protected $id;
		function __construct($id)
		{
			# code...
			parent::__construct();

			# get db connection
			$this->plug = dbconnect::connect();

			# collect data
			$this->id = $id;
		}


		// delete single post
		public function deleteSingleTeam()
		{
			# write delete query
			$deleteQuery = "DELETE FROM teams WHERE id = '".$this->id."' ";

			// validate if post has been deleted 
			if (mysqli_query($this->plug, $deleteQuery) === TRUE) {
				# code...
				echo("<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Team deleted successfully.</h5></div>");
				exit();
			}else{

				echo("<div class='alert alert-danger'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:white'>Sorry, an error occured.</h5></div>");
				exit();
			}
		}
	}
 ?>