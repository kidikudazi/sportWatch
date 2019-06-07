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

	public function editPost($id){

		// get all general news
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
}


 ?>