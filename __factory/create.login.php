<?php 
include('../__class/class.sign_in.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$password = md5(sha1($password));

$createLogin = new SignIn($username, $password);
$createLogin->Login();

 ?>
