<?php

    include "inc/init.php";

    $page->title = "Welcome to ". $set->site_name;

    $presets->setActive("home"); // we highlight the home link

    include 'header1.php';

    if (isset($_GET['error'])){
        $opt = new Options();
        $error = "Oops, an error occurred during the previous process. Please try again...";
        $opt->error($error); // flashes an error message
    }

    if($user->group->type == 1) {

//       include 'nceForm1.php';
        include 'formWizard.php';

    }else if($user->group->type == 2){
        include "headOfLabUnitHome1.php";

    }else if($user->group->type == 3){
        include "qualityOfficerHome1.php";
    }
    // if no user is logged in, show
    if(!$user->islg()) {
        ?>
        <style>
            img {
                width: 100%;
                height: 100%;
            }

        </style>
        <div class="container">
            <div class="row">
                <h2 style="text-align: center">UNIVERSITY TEACHING HOSPITAL</h2>
                <h3 style="text-align: center">Non Conformance Database / Incident tracking system </h3>
                <br/>
                <div>
                    <img src="img/uth.jpg"/>
                </div>
            </div> <!-- ./row -->
        </div> <!-- /container -->

        <?php
    }// end if

//    if($user->group->type == 1) {
    include 'footer.php';
   // }