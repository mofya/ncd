<?php

include "../inc/init.php";
include '../lib/captcha/captcha.php';

$page->title = "Register to ". $set->site_name;

$presets->setActive("adminpanel"); // we set admin panel active in the navbar


// determine if captcha code is correct
$captcha = ((!$set->captcha) || ($set->captcha && isset($_SESSION['captcha']) && isset($_POST['captcha']) &&
        ($_SESSION['captcha']['code'] === $_POST['captcha'])));

if($_POST && isset($_SESSION['token']) && ($_SESSION['token'] == $_POST['token']) && $set->register && $captcha) {

    // we validate the data
    $name = $_POST['name'];
    $display_name = $_POST['display_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $groupid = $_POST['role'];


    if(!isset($name[2]) || isset($name[31]))
        $page->error = "Username should be between 3 and 30 characters long!";

    if(!$options->validUsername($name))
        $page->error = "Invalid username!";

    if(!isset($display_name[2]) || isset($display_name[51]))
        $page->error = "Display name should be between 3 and 50 characters long!";

    if(!isset($password[2]) || isset($password[31]))
        $page->error = "Password should be between 3 and 30 characters long!";

    if(!$options->isValidMail($email))
        $page->error = "Email address is not valid.";

    if($db->getRow("SELECT `userid` FROM `".MLS_PREFIX."users` WHERE `username` = ?s", $name))
        $page->error = "Username already in use !";

    if($db->getRow("SELECT `userid` FROM `".MLS_PREFIX."users` WHERE `email` = ?s", $email))
        $page->error = "Email already in use!";


    if(!isset($page->error)){
        $user_data = array(
            "username" => $name,
            "display_name" => $display_name,
            "password" => sha1($password),
            "email" => $email,
            "lastactive" => time(),
            "regtime" => time(),
            "validated" => 1,
            "groupid" => $groupid
        );

        if($set->email_validation == 1) {

            $user_data["validated"] = $key = sha1(rand());

            $link = $set->url."/validate.php?key=".$key."&username=".urlencode($name);


            $url_info = parse_url($set->url);
            $from ="From: not.reply@".$url_info['host'];
            $sub = "Activate your account!";
            $msg = "Hello ".$options->html($name).",<br> Your account has successfully been created.<br/><br/> To confirm your account 
                <a href='$link'>click here</a>.<br>If you can't access copy this to your browser<br/>$link  
                <br><br>Regards<br><small>Note: Don't reply to this email. If you got this email by mistake then ignore this email.</small>";
            if(!$options->sendMail($email, $sub, $msg, $from))
                // if we can't send the mail by some reason we automatically activate the account
                $user_data["validated"] = 1;
        }

        if(($db->query("INSERT INTO `".MLS_PREFIX."users` SET ?u", $user_data)) && ($id = $db->insertId()) &&
            $db->query("INSERT INTO `".MLS_PREFIX."privacy` SET `userid` = ?i", $id)) {
            $page->success = 1;
            $user = new User($db);
        } else
            $page->error = "There was an error! Please try again!";

    }


} else if($_POST)
    if(!$captcha)
        $page->error = "Invalid captcha code!";
    else
        $page->error = "Invalid request!";


include '../header1.php';
?>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-3">
                <div class="well sidebar-nav sidebar-nav-fixed">
                    <ul class="nav nav-list">
                        <li class="nav-header">ADMIN OPTIONS</li>
                        <li><a href='index.php'>General Settings</a></li>
                        <li class="active"><a href="register.php">Create Account</a></li>
                        <li><a href='groups.php'>Groups Management</a></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->
            <div class="col-md-9">

<?php
if(!$set->register) // we check if the registration is enabled
    $options->fError("We are sorry registration is blocked momentarily please try again later!");


$_SESSION['token'] = sha1(rand()); // random token

if($set->captcha)
    $_SESSION['captcha'] = captcha();


$extra_content = ''; // holds success or error message

if(isset($page->error))
    $extra_content = $options->error($page->error);

if(isset($page->success)) {

    echo "<div class='container'>
    <div class='col-md-3 hidden-phone'></div>
    <div class='col-md-6 well'>
    <h1>Congratulations !</h1>";
    $options->success("<p><strong>Your account has successfully been created !</strong></p>");

} else {


    if($set->captcha)
        $captcha =  "
  <div class='form-group'>
    <label class='control-label col-md-3' for='captcha'>Enter the code:</label>
    <div class='col-md-6'>
      <img src='".$_SESSION['captcha']['image_src']."'><br>
      <input type='text' class='form-control' name='captcha' id='captcha'>
    </div>
  </div>";
    else
        $captcha = '';

    echo "
  <div class='container'>
   

      ".$extra_content."

      <div class='col-md-9'>
      <form action='#' id='contact-form' method='post'>
        <fieldset>
          <h3>Create User</h3>
          <hr/>

          <div class='form-group col-md-6'>
            <div class='col-md-6'>
              <input type='text' class='form-control' placeholder='Username' name='name' id='name'>
            </div>
          </div>
          <div class='form-group col-md-6'>
            <div class='col-md-6'>
              <input type='text' class='form-control' placeholder='Display name' name='display_name' id='display_name'>
            </div>
          </div>
          <div class='form-group col-md-6'>
            <div class='col-md-6'>
              <input type='text' class='form-control' placeholder='Email' name='email' id='email'>
            </div>
          </div>
          <div class='form-group col-md-6'>
            <div class='col-md-6'>
              <input type='password' class='form-control' placeholder='Password' name='password' id='password'>
            </div>
          </div>
         <div class='form-group col-md-6'>
            <div class='col-md-6'>
              <select class='form-control' name='role'>
              <option> --Select a role-- </option>";
                // gets all the mls_groups registered to the db
                $results = $db->getAll("SELECT * FROM `".MLS_PREFIX."groups`");
                foreach ($results as $result){
                    echo '<option value="'.$result->type.'"> '.$result->name.' </option>';
                }
             echo "       
              </select>
            </div>
          </div>
         
          <div class='col-md-8'>
          $captcha
          </div>
          <input type='hidden' name='token' value='".$_SESSION['token']."'>
          <div class='form-actions col-md-12'>
          <button type='submit' class='btn btn-primary btn-large'>Create</button>
            <button type='reset' class='btn'>Reset</button>
          </div>
        </fieldset>
      </form>
      </div>
    </div>
  </div>";
}
?>

<?php
include '../footer.php';
?>
