<?php 
  require_once("../includes/database.php");

  if (isset($db)) { echo "true"; } else { echo "false"; }

  echo "<br>";

  echo $db->escape_prep("eet's working");

  echo "<br>";

  // $sql = "INSERT INTO users (id, username, password, first_name, last_name) VALUES (1, 'efitz', 'Password1', 'Eliz', 'Fitz')"; 

  // $result = $db->run_query($sql);

  $sql = "SELECT * FROM users WHERE id=1";

  $result = $db->run_query($sql);

  $found_user = $db->fetch_array($result);

  echo "<br>";

  echo $found_user['username'];

?>