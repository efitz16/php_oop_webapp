<?php
  class Session {
  	private $logged_in = false;
  	public $user_id;

  	function __construct() {
  	  session_start();
  	  $this->check_login();
  	}

  	private function check_login() {
  	  if(isset($_SESSION['user_id'])) {
  	  	$this->user_id = $_SESSION['user_id'];
  	  	$this->logged_in = true;
  	  } else {
  	  	unset($this->user_id);
  	  	$this->logged_in = false;
  	  }
  	}

  	public function is_logged_in() {
  	  return $this->logged_in;
  	}

  	public function log_out() {
  	  unset($_SESSION['user_id']);
  	  unset($this->user_id);
  	  $this->logged_in = false;
  	}

  	public function login($user) {
  	  if($user) {
  	  	$this->user_id = $_SESSION['user_id'] = $user->id;
  	  	$this->logged_in = true;
  	  }
  	}

  }

  $session = new Session();
?>