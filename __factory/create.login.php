<?php 
include('../__class/class.sign_in.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$createLogin = new SignIn($username, $password);
$createLogin->Login();

 ?>
