<?php 
  require_once('../../includes/functions.php');
  require_once('../../includes/sessions.php');

  if(!$session->is_logged_in()) { redirect_to("login.php"); }
?>

<!DOCTYPE html>
<html>
<head>
	<title>OOP PHP</title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
  <div id="header">
  	<h1>Photo Gallery</h1>
  </div>
  <div id="main">
  	<h2></h2>
  </div>

</body>
</html>