<?php

# connection
include("../__config/core.php");

/**
 * Player registration class
*/
class RegisterPlayer extends dbconnect {

	protected $plug;
	protected $club;
	protected $picture;
	protected $player_name;
	protected $playing_position;
	protected $jersery;

	function __construct($club, $picture, $player_name, $playing_position, $jersery) {

		# parent
		parent::__construct();

		# connection
		$this->plug = dbconnect::connect();

		# collect data
		$this->club = $club;
		$this->picture = $picture;
		$this->player_name = $player_name;
		$this->playing_position = $playing_position;
		$this->jersery = $jersery;
	}

	public function register() {

		# validate player club and player
		$check_player_club = "SELECT * FROM players WHERE team_id = '".$this->club."' AND player_name = '".$this->player_name."' ";
		$validate = mysqli_query($this->plug, $check_player_club);
		$result = mysqli_num_rows($validate);

		if($result > 0){

			echo '<span style="color: red;">Sorry,, duplicate player record is not permitted.</span>';
		}else{

			# validate player and playing position
			$check_player_position = "SELECT * FROM players WHERE player_name  = '".$this->player_name."' AND playing_position = '".$this->playing_position."' ";
			$validate = mysqli_query($check_player_position);
			$result = mysqli_num_rows($validate);

			if ($result > 0) {

				echo '<span style="color: red;">Sorry, duplicate player record is not allowed.</span>';
			}else{

				# validate jersery number
				$check_player_jersery = "SELECT * FROM players WHERE jersery_number = '".$this->jersery."' ";
				$validate = mysqli_query($this->plug, $check_player_jersery);
				$result = mysqli_num_rows($validate);

				if($result > 0){

					echo '<span style="color: red;">Sorry, this jersery number is taken.</span>';
				}else{

					# save player record
					$save_player_record  = "INSERT INTO players (team_id, picture, player_name, playing_position, jersery_number)";
					$save_player_record .= "VALUES ('".$this->club."', '".$this->picture."', '".$this->player_name."', '".$this->playing_position."', '".$this->jersery."')";
					$query = mysqli_query($this->plug, $save_player_record);

					if(!$query){

						echo '<span style="color: red;">Sorry, an error occurred.</span>'.mysqli_error($this->plug);
					}elseif (mysqli_affected_rows($query) > 0) {

						echo '<span style="">Player Registration Successful.</span>';
					}else{

						echo '<span>Sorry, your request could not be processed.</span>';
					}
				}
			}
		}
	}
}
?>