<?php

//    include "inc/init.php";
//
//    $page->title = "Welcome to ". $set->site_name;
//
//    $presets->setActive("home"); // we highlith the home link

    //we generate the navbar components in case they weren't before
    if($page->navbar == array())
        $page->navbar = $presets->GenerateNavbar();

    if(!$user->islg()) // if it's not logged in we hide the user menu
        unset($page->navbar[count($page->navbar)-1]);

?>

<!DOCTYPE html>
<html class="no-js" xmlns:display="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $page->title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo $set->url; ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.0/metisMenu.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
        <link rel="stylesheet" href="<?php echo $set->url; ?>/css/bootstrap-table.css">
        <link rel="stylesheet" href="<?php echo $set->url; ?>/css/main.css">

        <!-- form wizard css -->
        <link rel="stylesheet" href="<?php echo $set->url; ?>/css/wizard.css">

        <link rel="stylesheet" href="<?php echo $set->url; ?>/js/datepicker/css/datepicker.css">

        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="<?php echo $set->url; ?>/css/responsive.css">

        <!-- Chart js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    </head>
    <body>

        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="<?php echo $set->url?>">
                            <?php echo $set->site_name ?>
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                        <?php
                            // we generate a simple menu
                            if($user->islg())
                            {

                                foreach ($page->navbar as $key => $v)
                                {

                                    if ($v[0] == 'item')
                                    {

                                        echo "<li".($v[1]['class'] ? " class='".$v[1]['class']."'" : "").">
                                            <a href='".$v[1]['href']."'>".$v[1]['name']."</a></li>";

                                    } else if($v[0] == 'dropdown')
                                    {

                                        echo "
                                            <li class='dropdown".
                                            // extra classes
                                            ($v['class'] ? " ".$v['class'] : "")."'".
                                            //extra style
                                            ($v['style'] ? " style='".$v['style']."'" : "").">
                            
                                            <a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$v['name']." <b class='caret'></b></a>
                                            <ul class='dropdown-menu'>";
                                        foreach ($v[1] as $k => $v)

                                            echo "<li".

                                                ($v['class'] ? " class='".$v['class']."'" : "").">
                            
                                                <a href='".$v['href']."'>".$v['name']."</a></li>";
                                        echo "</ul></li>";

                                    }

                                }

                            }
                            ?>
                        </ul> <!-- ./left menu -->

                        <?php // if user not logged in show login button
                        if(!$user->islg()){ ?>
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo $set->url;?>/login.php">Login</a></li>
                            </ul>
                        <?php
                        } // end if
                        ?>
                    </div>
                </div>
            </nav>
        </div>



<?php
if($user->data->banned) {

    // we delete the expired banned
    $_unban = $db->getAll("SELECT `userid` FROM `".MLS_PREFIX."banned` WHERE `until` < ".time());
    if($_unban)
        foreach ($_unban as $_usr) {
            $db->query("DELETE FROM `".MLS_PREFIX."banned` WHERE `userid` = ?i", $_usr->userid);
            $db->query("UPDATE `".MLS_PREFIX."users` SET `banned` = '0' WHERE `userid` = ?i", $_usr->userid);
        }


    $_banned = $user->getBan();
    if($_banned)
        $options->error("You were banned by <a href='$set->url/profile.php?u=$_banned->by'>".$user->showName($_banned->by)."</a> for `<i>".$options->html($_banned->reason)."</i>`.
            Your ban will expire in ".$options->tsince($_banned->until, "from now.")."
            ");

}

if($user->islg() && $set->email_validation && ($user->data->validated != 1)) {
    $options->fError("Your account is not yet acctivated ! Please check your email !");
}

if(isset($_SESSION['success'])){
    $options->success($_SESSION['success']);
    unset($_SESSION['success']);
}
if(isset($_SESSION['error'])){
    $options->error($_SESSION['error']);
    unset($_SESSION['error']);

}
flush(); // we flush the content so the browser can start the download of css/js