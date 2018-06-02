<?php
//Step1
	$db = mysqli_connect("localhost","root","root");
	if (!$db) {
	die("Database connection failed miserably: " . mysqli_error($db));
	}
//Step2
	$db_select = mysqli_select_db($db, "monkey_incident_tracking");
	if (!$db_select) {
	die("Database selection also failed miserably: " . mysqli_error($db));
	}
