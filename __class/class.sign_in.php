<?php
include("../__config/core.php");
session_start();
/**
*Class for login
*/
class SignIn extends dbconnect
{
	protected $plug;
	protected $username;
	protected $password;
	function __construct($username, $password)
	{
		# parent construct
		parent::__construct();

		# link database connection
		$this->plug = dbconnect::connect();

		#collect data

		$this->username = $username;
		$this->password = $password;
	}

	public function Login ()
	{
		#check if login details match
		$check_details = "SELECT * FROM admin WHERE username = '".$this->username."' AND password = '".$this->password."' ";
		$result = mysqli_query($this->plug, $check_details);
		$check_output = mysqli_num_rows($result);

		if ($check_output == 1) {
			# code...
			while ($row = mysqli_fetch_array($result)) {
				# code...
				extract($row);
				$user = $row['username'];
				$_SESSION['user'] = $user;
				echo "<script>
					window.location.href = '../admin/home.php';
				  </script>";
			}

		}else{

			echo "<h2><font color='red'>Error!! invalid login details</font></h2>";
		}
	}
}

?>