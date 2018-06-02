<?php

include "../inc/init.php";

if(!$user->isAdmin()) {
    header("Location: $set->url");
    exit;
}


$page->title = "Admin Panel";

$presets->setActive("adminpanel");


if($_POST) {

  $data = $db->getRow("SELECT * FROM `".MLS_PREFIX."settings` LIMIT 1");
  $columns = get_object_vars($data);
  
  $sql = "UPDATE `".MLS_PREFIX."settings` SET ";
  
  foreach ($columns as $k => $v)
    if($k != 'userid') 
      $sql .= $db->parse(" ?n = ?s,", $k, $_POST[$k]);

  $sql = trim($sql, ",")." LIMIT 1";

  if($db->query(" ?p ", $sql))
    $page->success = "Settings saved !";
  else
    $page->error = "Some error came up !";

}

// we grab the settings and we merge them into $set
$set = (object)array_merge((array)$set,(array)$db->getRow("SELECT * FROM `".MLS_PREFIX."settings` LIMIT 1"));

include "../header1.php";

?>
<div class="container-fluid">
<div class="row-fluid">
 <div class="col-md-3">
   <div class="well sidebar-nav sidebar-nav-fixed">
    <ul class="nav nav-list">
      <li class="nav-header">ADMIN OPTIONS</li>
      <li class='active'><a href='?'>General Settings</a></li>
      <li><a href="register.php">Create Account</a></li>
      <li><a href='groups.php'>Groups Management</a></li>
    </ul>
   </div><!--/.well -->
 </div><!--/span-->
 <div class="col-md-9">
<?php


// we make sure we get the leatest data
$data = $db->getRow("SELECT * FROM `".MLS_PREFIX."settings` LIMIT 1");

$columns = get_object_vars($data);



if(isset($page->error))
  $options->error($page->error);
else if(isset($page->success))
  $options->success($page->success);




echo "<div class='col-md-10'>
  <form class='form-horizontal' action='#' method='post'>
      <fieldset>

      <h3>General Settings</h3>
        <hr/>";

foreach ($columns as $key => $value) {
  $safe_name = $options->html($key);
  $safe_val = $options->html($value);

  // we try to guess why type of input to show
  // if you don't like this approch you can always use the classic one
  // but i beleive this is more time saving in development and it will work better

  if(in_array($key, array("register", "email_validation", "captcha"))) // add in this array columns that you want to have enabled/disabled select menu
  echo "
      <div class='form-group col-md-6'>
        <label class='control-label col-md-3' for='$safe_name'>".$options->prettyPrint($safe_name)."</label>
        <div class='col-md-9'>
          <select id='$safe_name' name='$safe_name' class='form-control'>
            <option value='1' ".($value == 1 ? "selected='1'" : "").">Enabled</option>
            <option value='0' ".($value == 0 ? "selected='1'" : "").">Disabled</option>
          </select>
        </div>
      </div>";
  else if(strpos($value, "\n") !== FALSE)
  echo "
      <div class='form-group col-md-6'>
        <label class='control-label col-md-3' for='$safe_name'>".$options->prettyPrint($safe_name)."</label>
        <div class='col-md-9'>
          <textarea id='$safe_name' name='$safe_name' class='form-control'>$safe_val</textarea>
        </div>
      </div>";
  else
  echo "
      <div class='form-group col-md-6'>
        <label class='control-label col-md-3' for='$safe_name'>".$options->prettyPrint($safe_name)."</label>
        <div class='col-md-9'>
          <input id='$safe_name' name='$safe_name' type='text' value='$safe_val' class='form-control'>
        </div>
      </div>";

      

}


echo "<div class='form-group'>
        <div class='col-md-10'>
          <button type='submit' class='btn btn-primary btn-lg col-md-offset-2'>Save</button>
        </div>
      </div>

      </fieldset>
  </form>
  </div>";

?>


 </div><!--/span-->
</div><!--/row-->

</div><!--/.fluid-container-->



<?php
include '../footer.php';
?>