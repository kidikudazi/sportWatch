<?php

# registration class
include('../__class/class.register_team.php');

# form params
$team_logo = $_REQUEST['logo'];
$team_name = $_REQUEST['team_name'];
$coach_name = $_REQUEST['coach_name'];
$address = $_REQUEST['address'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];

# init registration
$register = new RegisterTeam();
$register->register();

?>