<?php
  require_once("database.php");

  class User {

  	public $id;
  	public $username;
  	public $password;
  	public $first_name;
  	public $last_name;

  	public static function find_all() {
  	  global $db;

  	  $result_set = self::find_by_sql("SELECT * FROM users");

  	  return $result_set;
  	}

  	public static function find_by_id($id=0) {
  	  global $db;

  	  $result_array = self::find_by_sql("SELECT * FROM users WHERE id={$id} LIMIT 1");

  	  return !empty($result_array) ? array_shift($result_array) : false;
  	}

  	public static function find_by_sql($sql="") {
  	  global $db;

  	  $result_array = $db->run_query($sql);

  	  $object_array = array();

  	  while($row = $db->fetch_array($result_array)) {
  	  	$object_array[] = self::instantiate($row);
  	  }

  	  return $object_array;
  	}

  	public function full_name() {
  	  if(isset($this->first_name) && isset($this->last_name)) {
  	  	return $this->first_name." ".$this->last_name;
  	  } else {
  	  	return "";
  	  }
  	}

  	private static function instantiate($record) {
      $object = new self;

  	  foreach($record as $attribute=>$value) {
  	  	if($object->has_attribute($attribute)) {
  	  	  $object->$attribute = $value;
  	  	}
  	  }
  	  return $object;
  	}

  	private function has_attribute($attribute) {
  	  $object_vars = get_object_vars($this);

  	  return array_key_exists($attribute, $object_vars);
  	}

    public static function authenticate($username="", $password = "") {
      global $db;

      $username = $db->escape_prep($username);
      $password = $db->escape_prep($password);

      $sql = "SELECT * FROM users WHERE username = '{$username}' AND password='{$password}' LIMIT 1";

      $result_array = self::find_by_sql($sql);

      return !empty($result_array) ? array_shift($result_array) : false;
    }

  }

?>