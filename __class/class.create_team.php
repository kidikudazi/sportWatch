<?php 
	include('../__config/core.php');

	/**
	 * create new competitions
	 */
	class CreateTeams extends dbconnect
	{
		protected $plug;
		protected $team_name;
		protected $coach_name;
		protected $address;
		protected $email;
		protected $phone_number;
		protected $file_temp;
		protected $target_directory;

		function __construct($team_name, $coach_name, $address, $email, $phone_number, $file_temp, $target_directory)
		{
			# code...
			parent::__construct();

			# connect db
			$this->plug = dbconnect::connect();

			# collect data
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
		public function createNewTeam()
		{
			// validate if competion alreayd exist
			$validateTeam = "SELECT * FROM teams WHERE team_name = '".$this->team_name."' AND status = 'Active' ";

			$validateResult = mysqli_query($this->plug, $validateTeam);

			$validateTeamOutput = mysqli_num_rows($validateResult);

			if ($validateTeamOutput > 0 ) {
				# code...
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, a team with this name already exist.</h2></div>";
				header('Location:../admin/reg_teams.php');
			}
			
			// save data
			$saveTeam = "INSERT INTO teams (team_logo, team_name, coach_name, address, phone, email, status) VALUES ('".$this->target_directory."', '".$this->team_name."', '".$this->coach_name."', '".$this->address."', '".$this->phone_number."', '".$this->email."', 'Active')";

			if (mysqli_query($this->plug, $saveTeam) === TRUE) {
				# code...
				// move files to folder
				move_uploaded_file($this->file_temp, $this->target_directory);
				$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Team regsitered successfully.</h5></div>";

				header('Location:../admin/reg_teams.php');
			}else{
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, an error occurred.</h2></div>";
				header('Location:../admin/reg_teams.php');	
			}
		}
	}



 ?>