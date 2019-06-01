<?php

include("../__config/core.php");

class RegisterTeam extends dbconnect {

	protected $plug;
	protected $team_name;
	protected $team_logo;
	protected $coach_name;
	protected $address;
	protected $phone;
	protected $email;

	function __construct($team_logo, $team_name, $coach_name, $address, $phone, $email){

		# parent construc
		parent::__construct();

		# connection
		$this->plug = dbconnect::connect();

		# collect data
		$this->team_logo = $team_logo;
		$this->team_name = $team_name;
		$this->coach_name = $coach_name;
		$this->address = $address;
		$this->phone = $phone;
		$this->email = $email;
	}

	# register team
	public function register() {

		# check if team name existence
		$check_team_name = "SELECT * FROM teams WHERE team_name = '".$this->team_name."' ";
		$validate = mysqli_query($this->plug, $check_team_name);
		$result = mysqli_num_rows($validate);

		if($result > 0){

			echo '<span style="color: red;">Sorry, team name already exists.</span>';
		}else{

			# validate team name and address
			$check_team_name_address = "SELECT * FROM team_name WHERE = '".$this->team_name."' AND address  = '".$this->address."' ";
			$validate = mysqli_query($this->plug, $check_team_name_address);
			$result = mysqli_num_rows($validate);

			if($result > 0){

				echo '<span style="color: red;">Sorry, duplicate team record is not permitted.</span>';
			}else{

				# validate phone
				$check_team_phone = "SELECT * FROM teams WHERE = '".$this->phone."' ";
				$validate = mysqli_query($this->plug, $check_team_phone);
				$result = mysqli_num_rows($validate);

				if($result > 0){

					echo '<span style="color: red;">Sorry, phone number already exists.</span>';
				}else{

					if($email == null){

					}else{

						# save team's record
						$save = "INSERT INTO teams (team_logo, team_name, coach_name, address, phone, email)";
						$save .= "VALUES ('".$this->team_logo."', '".$this->team_name."', '".$this->coach_name."', '".$this->address."',";
						$save .= " '".$this->phone."',  '".$this->email."')";

						$query = mysqli_query($this->plug, $save);
						if(!$query){

							echo '<span style="color: red;">Sorry, an error occurred.</span>'.mysqli_error($this->plug);
						}else if(mysqli_affected_rows($query) > 0){

							echo '<span>Team Registration Successful.</span>';
						}else{

							echo '<span>Sorry, your request could not be processed.</span>';
						}
					}
				}
			}
		}
	}
}

?>