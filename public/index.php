<?php 
  require_once("../includes/database.php");
  require_once("../includes/user.php");

  if (isset($db)) { echo "true"; } else { echo "false"; }

  echo "<br>";

  $found_user = User::find_by_sql("SELECT * FROM users;");

  echo "<br>";

  echo $found_user['username'];

?>