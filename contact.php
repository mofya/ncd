<?php


include "inc/init.php";

if($user->isAdmin()) {
    header("Location: $set->url");
    exit;
}

$page->title = "Contact to ". $set->site_name;


$presets->setActive("contact"); // we highlith the contact link


if($_POST && isset($_SESSION['token']) && ($_SESSION['token'] == $_POST['token'])) {

	  $email = $_POST['email'];
	  $message = $_POST['message'];

	  if(!$options->isValidMail($email)) 
	    $page->error = "Email address is not valid.";
	  else if(!isset($message[10]))
	    $page->error = "Message was too short !";
	  else {
            $from ="From: ".$email;
            $sub = "Contact Admin $set->site_name !";
            if($options->sendMail($email, $sub, $message, $from))
                $page->success = "Your message was sent !";

	  }
} else if($_POST)
    $page->error = "Invalid request !";


include 'header1.php';

$_SESSION['token'] = sha1(rand()); // random token

echo "<div class='container'>
    <div class='col-md-3 hidden-phone'></div>
	<div class='col-md-6'>	";


if(isset($page->error))
  $options->error($page->error);
else if(isset($page->success))
  $options->success($page->success);

	echo "<form class='form-horizontal well' action='#' method='post'>
		        <fieldset>
		            <legend>Contact Admin</legend>

		            <div class='form-group'>
		              <div class='control-label col-md-3'>
		                <label>Your Email</label>
		              </div>
		              <div class='col-md-6'>
		                <input type='text' name='email' class='form-control' value='".($user->islg() ? $user->filter->email : "")."'>
		              </div>
		            </div>

		            <div class='form-group'>
		              <div class='control-label col-md-3'>
		                <label>Message</label>
		              </div>
		              <div class='col-md-6'>
		                <textarea name='message' rows='5' class='form-control'></textarea>
		              </div>
		            </div>

           			<input type='hidden' name='token' value='".$_SESSION['token']."'>

		            <div class='form-group'>
		              <div class='col-md-offset-2'>
		              <button type='submit' id='submit' class='btn btn-primary'>Send</button>
		              </div>
		            </div>
		          </fieldset>
		    </form>
		    
		    </div>
	</div><!-- /container -->";

include 'footer.php';