<?php 
include('../__config/core.php');

/**
 * general class to fetch records
 */
class FetchRecords extends dbconnect
{
	protected $plug;

	function __construct()
	{
		# code...
		parent::__construct();

		# link database connection
		$this->plug = dbconnect::connect();
	}

	/**
	* fetch all general news
	*/
	public function fetchGeneralNews()
	{
		// get all general news
		$fetchNews = "SELECT * FROM posts WHERE category = 'General News' ORDER BY id DESC LIMIT 3";

		$result = mysqli_query($this->plug, $fetchNews);

		$totalRecords = mysqli_num_rows($result);

		if ($totalRecords < 1) {
			# code...
			echo '<h6>No News Found.</h6>';
		}else{

			while ($row = mysqli_fetch_assoc($result)) {
				# code...
          		echo ('<div class="col-md-6 col-lg-4">');
          		echo ('
          				<div class="p-3 p-md-5 feature-block-1 mb-5 mb-lg-0 bg" style="height:300px; background-image: url('.str_replace('../', '',$row["post_image"]).');">
          			');
          		echo('<div class="text">');
          		echo('<h2 class="h5 text-white">'.$row["heading"].'</h2>');
				echo('<p>'.substr($row["body"], 0,150).'</p>');
				echo('<p class="mb-0"><a href="#" class="btn btn-primary btn-sm px-4 py-2 rounded-0">Read More</a></p>');
				echo('              
						</div>
			            </div>
			          </div>
		          ');

			}
		}
	}

	/**
	* fetch all post list
	*/
	public function fetchAllPostList(){
		// get all general news
		$fetchNews = "SELECT * FROM posts";

		$result = mysqli_query($this->plug, $fetchNews);

		$totalRecords = mysqli_num_rows($result);

		if ($totalRecords < 1) {
			# code...
			echo '<h6>No News Found.</h6>';
		}else{
			$data = [];
			while($row = mysqli_fetch_assoc($result))
			{
				$data[]= $row;
			}

			return $data;
		}
	}

	/**
	* edit post
	*/
	public function editPost($id){

		// get a post to edit
		$fetchPost = "SELECT * FROM posts WHERE id = '".$id."' ";

		$result = mysqli_query($this->plug, $fetchPost);

		$totalRecords = mysqli_num_rows($result);

		if ($totalRecords < 1) {
			# code...
			echo '<h6>No News Found.</h6>';
		}else{
			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	/**
	* fetch all competions
	*/
	public function fetchAllCreatedCompetitions(){
		// get all created competitions
		$getCompetitions = "SELECT * FROM competitions ORDER BY id DESC";

		$result = mysqli_query($this->plug, $getCompetitions);

		$totalRecords = mysqli_num_rows($result);

		if($totalRecords > 0){

			$data = [];
			while($row = mysqli_fetch_assoc($result))
			{
				$data[]= $row;
			}

			return $data;
		}else{
			$data = [];
			return $data;
		}
	}

	/**
	* edit competitions
	*/
	public function editCompetition($id){
		// get a competition to edit
		$getCompetition = "SELECT * FROM competitions WHERE id = '".$id."' ";

		$result = mysqli_query($this->plug, $getCompetition);

		$totalRecords = mysqli_num_rows($result);

		if ($totalRecords < 1) {
			# code...
			echo '<h6>No Copetition found Found.</h6>';
			header("Location: ../admin/404.php");
		}else{
			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	/**
	* fetch all competitions
	*/
	public function fetchAllRegisteredTeams(){
		# get all registered teams
		$getRegTeams = "SELECT * FROM teams ORDER BY id DESC";
		$result = mysqli_query($this->plug, $getRegTeams);
		$totalRecords =  mysqli_num_rows($result);
		
		if ($totalRecords > 0) {
			# code...
			$data = [];
			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$data[] = $row;
			}
			return $data;
		}else{
			$data = [];
			return $data;
		}
	}

	/**
	* edit team details
	*/
	public function editTeam($id){
		// get team details
		$teamDetails = "SELECT * FROM teams WHERE id = '".$id."' ";

		$result = mysqli_query($this->plug, $teamDetails);

		$outputResult = mysqli_num_rows($result);

		if ($outputResult < 1) {
			# code...
			header("Location: ../admin/404.php");
		}else{

			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	/**
	* get all registered players
	*/
	public function fetchAllRegisteredPlayers()
	{
		# get all resgistered players
		$fetchPlayers = "SELECT players.id,players.player_name, players.playing_position, players.team_id, teams.team_name FROM players LEFT JOIN teams ON players.team_id = teams.id ORDER BY players.id DESC";
		$result = mysqli_query($this->plug, $fetchPlayers);
		$totalRecords = mysqli_num_rows($result);

		if($totalRecords > 0){
			$data = [];
			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$data[] = $row;
			}
			return $data;
		}else{
			$data = [];
			return $data;
		}
	}

	/**
	*  edit player record
	*/
	public function editPlayerRecord($id)
	{
		// get team details
		$playerDetails = "SELECT players.id, players.jersey_number, players.player_name, players.playing_position, players.team_id, teams.team_name FROM players LEFT JOIN teams ON players.team_id = teams.id WHERE players.id = '".$id."' ";

		$result = mysqli_query($this->plug, $playerDetails);

		$outputResult = mysqli_num_rows($result);

		if ($outputResult < 1) {
			# code...
			header("Location: ../admin/404.php");
		}else{

			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	/**
	* fetch all competition teams
	*/
	public function fetchAllCompetionTeams()
	{
		# get all resgistered players
		$fetch = "SELECT competition_teams.id, competitions.competition_name, teams.team_name FROM competition_teams LEFT JOIN teams ON competition_teams.team_id = teams.id LEFT JOIN competitions ON competition_teams.competition_id = competitions.id ORDER BY competition_teams.id DESC";
		$result = mysqli_query($this->plug, $fetch);
		$totalRecords = mysqli_num_rows($result);

		if($totalRecords > 0){
			$data = [];
			while ($row = mysqli_fetch_assoc($result)) {
				# code...
				$data[] = $row;
			}
			return $data;
		}else{
			$data = [];
			return $data;
		}
	}

	/**
	* edit competition teams
	*/
	public function editCompetitionTeam($id)
	{
		// get team details
		$getDetails = "SELECT competition_teams.id, competitions.competition_name, teams.team_name FROM competition_teams LEFT JOIN teams ON competition_teams.team_id = teams.id LEFT JOIN competitions ON competition_teams.competition_id = competitions.id WHERE competition_teams.id = '".$id."' ";

		$result = mysqli_query($this->plug, $getDetails);

		$outputResult = mysqli_num_rows($result);

		if ($outputResult < 1) {
			# code...
			header("Location: ../admin/404.php");
		}else{

			$row = mysqli_fetch_assoc($result);

			return $row;
		}
	}

	/**
	* fetch match news
	*/
	public function fetchMatchNews()
	{
		// fetch all match news
		$fetchNews = "SELECT * FROM posts WHERE category = 'Match Highlight' ";

		$result = mysqli_query($this->plug, $fetchNews);

		$totalRecords = mysqli_num_rows($result);

		if ($totalRecords < 1) {
			# code...
			echo '<h6>No News Found.</h6>';
		}else{

			while ($row = mysqli_fetch_assoc($result)) {
				# code...
            	echo('<div class="item">');
            	echo('<div class="block-12">');
            	echo('<figure>');
            	echo('<img src="'.str_replace('../', '',$row["post_image"]).'" alt="Image" class="img-fluid" >');
            	echo('</figure>');
            	echo('<div class="text">');
            	echo('<span class="meta">'.date("M d Y", $row['post_date']).'</span>');
            	echo('<div class="text-inner">');
            	echo('<h2 class="heading mb-3"><a href="#" class="text-black">'.substr($row['heading'], 0,30).'</a></h2>');
            	echo('<p>'.substr($row['body'], 0,70).'</p>');
            	echo('</div>');
            	echo('</div>');
            	echo('</div>');
            	echo('</div>');
   
			}
		}
	}
}

// <div class="item">
// <!-- uses .block-12 -->
// <div class="block-12">
// <figure>
// <img src="public/images/img_1.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_2.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_3.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_4.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>
// <div class="item">
// <!-- uses .block-12 -->
// <div class="block-12">
// <figure>
// <img src="public/images/img_1.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_2.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_3.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_4.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>
// <div class="item">
// <!-- uses .block-12 -->
// <div class="block-12">
// <figure>
// <img src="public/images/img_1.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_2.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_3.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_4.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>
// <div class="item">
// <!-- uses .block-12 -->
// <div class="block-12">
// <figure>
// <img src="public/images/img_1.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_2.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_3.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>

// <div class="item">
// <div class="block-12">
// <figure>
// <img src="public/images/img_4.jpg" alt="Image" class="img-fluid">
// </figure>
// <div class="text">
// <span class="meta">May 20th 2018</span>
// <div class="text-inner">
// <h2 class="heading mb-3"><a href="#" class="text-black">World Cup Championship</a></h2>
// <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa, consectetur! Eligendi illo, repellat repudiandae cumque fugiat optio!</p>
// </div>
// </div>
// </div>
// </div>
 ?>