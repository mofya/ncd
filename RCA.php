<?php

include "inc/init.php";
include 'lib/pagination.class.php';

$page->title = "Analysis page of ". $set->site_name;
$presets->setActive("home"); // we highlight the home link
$content = ''; // will store the html code for users list

include "header1.php";

include "RCAFormView.php";
include "footer.php";