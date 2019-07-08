<?php 
	include('../__config/core.php');

	/**
	 * create new competitions
	 */
	class CreateCompetitons extends dbconnect
	{
		protected $plug;
		protected $competition_name;
		protected $competition_location;
		protected $start_date;
		protected $end_date;
		protected $tmp_name;
		protected $target_directory;

		function __construct($competition_name, $competition_location, $start_date, $end_date, $tmp_name, $target_directory)
		{
			# code...
			parent::__construct();

			# connect db
			$this->plug = dbconnect::connect();

			# collect data
			$this->competition_name = $competition_name;
			$this->competition_location = $competition_location;
			$this->start_date = $start_date;
			$this->end_date = $end_date;
			$this->tmp_name = $tmp_name;
			$this->target_directory = $target_directory;
		}

		/**
		* create new competition
		*/
		public function createNewCompetition()
		{
			// validate if competion alreayd exist
			$validateCompetition = "SELECT * FROM competitions WHERE competition_name = '".$this->competition_name."' AND start_date = '".$this->start_date."' OR status = 'Active' ";

			$validateResult = mysqli_query($this->plug, $validateCompetition);

			$validateCompetitionOutput = mysqli_num_rows($validateResult);

			if ($validateCompetitionOutput > 0 ) {
				# code...
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, a competition with this name is already running.</h2></div>";
				header('Location:../admin/reg_competitions.php');
			}

			// validate end date an start date
			if ($this->start_date > $end_date) {
				# code...
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, end date can not be greater than start date.</h2></div>";
				header('Location:../admin/reg_competitions.php');
			}

			// save data
			$saveComeptition = "INSERT INTO competitions (competition_logo, competition_name, location, start_date, end_date, status) VALUES ('".$this->target_directory."', '".$this->competition_name."', '".$this->competition_location."', '".$this->start_date."', '".$this->end_date."', 'Active')";

			if (mysqli_query($this->plug, $saveComeptition) === TRUE) {
				# code...
				// move files to folder
				move_uploaded_file($this->file_temp, $this->target_directory);
				$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Competition created successfully.</h5></div>";

				header('Location:../admin/reg_competitions.php');
			}else{
				$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  onclick='return sessionRemove(); id='msg-btn'>&times;</button><h2 style='color:red'>Sorry, an error occurred.</h2></div>";
				header('Location:../admin/reg_competitions.php');	
			}
		}
	}



 ?>