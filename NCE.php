<?php

	include "inc/init.php";
	include 'lib/pagination.class.php';

    $page->title = "Users of ". $set->site_name;
    $presets->setActive("analysis"); // we highlight the home link
    $content = ''; // will store the html code for users list

    include "header1.php";

    if($user->isAdmin()) {

		include "nceFormView.php";
	}else{

		include "display.php";
	}

	include "footer.php";
