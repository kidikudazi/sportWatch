<?php

# connection
include("../__config/core.php");

/**
 * Player registration class
*/
class updatePlayerRecord extends dbconnect {

	protected $plug;
	protected $id;
	protected $team_id;
	protected $player_name;
	protected $player_position;
	protected $jersey_number;
	protected $file_temp;
	protected $target_directory;

	function __construct($id, $team_id, $player_name, $player_position, $jersey_number, $file_temp, $target_directory) {

		# parent
		parent::__construct();

		# connection
		$this->plug = dbconnect::connect();

		# collect data
		$this->id = $id;
		$this->team_id = $team_id;
		$this->player_name = $player_name;
		$this->player_position = $player_position;
		$this->jersey_number = $jersey_number;
		$this->file_temp = $file_temp;
		$this->target_directory = $target_directory;
	}

	public function updateRecord() {

		# validate player club and player
		$check_player_club = "SELECT * FROM players WHERE team_id = '".$this->team_id."' AND player_name = '".$this->player_name."'  AND id != '".$this->id."' ";
		$validate = mysqli_query($this->plug, $check_player_club);
		$result = mysqli_num_rows($validate);
		if($result > 0){

			echo '<span style="color: red;">Sorry, duplicate player record is not permitted.</span>';
		}else{

			# validate player and playing position
			$check_player_position = "SELECT * FROM players WHERE player_name  = '".$this->player_name."' AND playing_position = '".$this->player_position."' AND id != '".$this->id."' ";
			$validate = mysqli_query($this->plug, $check_player_position);
			$result = mysqli_num_rows($validate);
			
			if ($result > 0) {

				echo '<span style="color: red;">Sorry, duplicate player record is not allowed.</span>';
			}else{

				# validate jersery number
				$check_player_jersey = "SELECT * FROM players WHERE jersey_number = '".$this->jersey_number."' AND id != '".$this->id."' ";
				$validateJersey = mysqli_query($this->plug, $check_player_jersey);
				$result = mysqli_num_rows($validateJersey);
				
				if($result > 0){
					$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, this jersery number is taken.</div>";
						header('Location:../admin/reg_players.php');
				}else{

					# update player record
					$update_player_record  = "UPDATE players SET team_id = '".$this->team_id."', picture = '".$this->target_directory."', player_name = '".$this->player_name."', playing_position = '".$this->player_position."', jersey_number = '".$this->jersey_number."'  WHERE id = '".$this->id."' ";
					
					$query = mysqli_query($this->plug, $update_player_record);
					
					if(!$query){
						$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, an error occurred.</div>";
						header('Location:../admin/reg_players.php');
					}elseif($query === TRUE) {
						// move files to folder
						move_uploaded_file($this->file_temp, $this->target_directory);
						$_SESSION['success']  = "<div class='alert alert-success'><button class='close' data-dismiss='alert' id='msg-btn' onclick='return sessionRemove();'>&times;</button><h5 style='color:green'>Player record updated successfully.</h5></div>";

						header('Location:../admin/reg_players.php');
					}else{
						$_SESSION['error'] =  "<div class='alert alert-danger'><button class='close' data-dismiss='alert'  id='msg-btn' onclick='return sessionRemove();>&times;</button>Sorry, your request could not be processed.</div>";
						header('Location:../admin/reg_players.php');
					}
				}
			}
		}
	}
}
?>