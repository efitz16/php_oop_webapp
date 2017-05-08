<?php 
  require_once('../../includes/functions.php');
  require_once('../../includes/session.php');
  require_once('../../includes/database.php');
  require_once('../../includes/user.php');

  if($session->is_logged_in()) { redirect_to("index.php"); 
  }

  if(isset($_POST['submit'])) {
  	$username = trim($_POST['username']);
  	$password = trim($_POST['password']);
 
    $user_found = User::authenticate($username, $password);

    if($user_found) {
    	$session->login($user_found);
    	redirect_to("index.php");
    } else {
    	$message = "Could not log in.";
    }
  } else {
  	$username = "";
  	$password = "";
  }
  
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

  <div id="main">
  	<h2>Login</h2>
  	<?php echo output_message($message); ?>

  	<form action="login.php" method="post">
  	  <label for="username">
  	  	Username:
  	  </label>
  	  <input type="text" name="username" value="<?php echo htmlentities($username); ?>" />
  	  <label for="password">
  	  	Password
  	  </label>
  	  <input type="password" name="password" value="<?php echo htmlentities($password); ?>">
  	  <input type="submit" name="submit" value="Login">
  	</form>
  </div>

</body>
</html>
<?php if(isset($db)) { $db->close_connection(); } ?>