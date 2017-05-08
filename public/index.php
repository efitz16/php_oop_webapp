<?php 
  require_once("../includes/database.php");
  require_once("../includes/user.php");
  require_once("../includes/functions.php");

  if (isset($db)) { echo "true"; } else { echo "false"; }

  echo "<br>";

  $user = User::find_by_id(1);

  echo "<br>";
  echo $user->full_name();

  echo "<br>";

  $users = User::find_all();

  foreach($users as $user) {
    echo $user->username."<br>";
    echo $user->full_name();
  }

?>