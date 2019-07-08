<?php 
	include('../__config/core.php');

	/**
	 * create new competitions
	 */
	class UpdateTeams extends dbconnect
	{
		protected $plug;
		protected $id;
		protected $team_name;
		protected $coach_name;
		protected $address;
		protected $email;
		protected $phone_number;
		protected $file_temp;
		protected $target_directory;

		function __construct($id, $team_name, $coach_name, $address, $email, $phone_number, $file_temp, $target_directory)
		{
			# code...
			parent::__construct();

			# connect db
			$this->plug = dbconnect::connect();

			# collect data
			$this->id = $id;
			$this->team_name = $team_name;
			$this->coach_name = $coach_name;
			$this->address = $address;
			$this->email = $email;
			$this->phone_number = $phone_number;
			$this->file_temp = $file_temp;
			$this->target_directory = $target_directory;
		}

		/**
		* create new competition
		*/
		public function updateSelectedTeam()
		{
			// validate if competion alreayd exist
			$validateTeam = "SELECT * FROM teams WHERE team_name = '".$this->team_name."' AND status = 'Active' AND id != '".$this->id."' ";

			$validateResult = mysqli_query($this->plug, $validateTeam);

			$validateTeamOutput = mysqli_num_rows($validateResult);

			if ($validateTeamOutput > 0 ) {
				# code...
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, a team with this name already exist.</h2></div>";
				header('Location:../admin/reg_teams.php');
			}
			
			// update data
			$updateData = "UPDATE teams SET team_logo = '".$this->target_directory."', team_name = '".$this->team_name."', coach_name = '".$this->coach_name."', address = '".$this->address."', phone = '".$this->phone_number."', email = '".$this->email."' ";

			if (mysqli_query($this->plug, $updateData) === TRUE) {
				# code...
				// move files to folder
				move_uploaded_file($this->file_temp, $this->target_directory);
				$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Team Data updated successfully.</h5></div>";

				header('Location:../admin/reg_teams.php');
			}else{
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, an error occurred.</h2></div>";
				header('Location:../admin/reg_teams.php');	
			}
		}
	}
 ?>