<?php 
include('../__class/class.fetchrecords.php');

$records = new FetchRecords;

$data = $records->fetchAllRegisteredTeams();
 ?>