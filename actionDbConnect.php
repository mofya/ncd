<?php
	include "databaseConnection.php";
	$c_review = $_POST['correctiveReview'];
	$eff_name = $_POST['effectiveName'];
	$eff_Date = $_POST['effectiveDate'];
	$eff_Sign = $_POST['effectiveSign'];
	$c_action = $_POST['correctiveAction'];
	$c_name = $_POST['correctiveName'];
	$c_date = $_POST['correctiveDate'];
	$c_sign = $_POST['correctiveSign'];
	$id=$_GET['id'];

	

	if(isset($_POST['submit']))
	{
		$result = mysql_query("INSERT INTO correcctive_review(correctiveReview,effectiveName,effectiveDate,effectiveSign,form_id)
		VALUES ('$c_review','$eff_name','$eff_Date','$eff_Sign','$id')", $db);
		if (!$result)
		{
			die("Database query failed: " . mysql_error());
		}
		$reslt = mysql_query("INSERT INTO corrective_actions(correctiveAction,correctiveName,correctiveDate,correctiveSign,form_id)
		VALUES ('$c_action','$c_name','$c_date','$c_sign','$id')", $db);
		if (!$reslt)
		{
			die("Database query failed: " . mysql_error());
		}
		mysql_close($db);
	}
	include "index.php";
?>
