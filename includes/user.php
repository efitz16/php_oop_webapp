<?php
  require_once("database.php");

  class User {

  	public static function find_all() {
  	  global $db;

  	  $result_set = self::find_by_sql("SELECT * FROM users");

  	  return $result_set;
  	}

  	public static function find_by_id($id=0) {
  	  global $db;

  	  $result_set = self::find_by_sql("SELECT * FROM users WHERE id={$id}");

  	  $found = $db->fetch_array($result_set);
  	  return $found;
  	}

  	public static function find_by_sql($sql="") {
  	  global $db;

  	  $result_set = $db->run_query($sql);

  	  return $result_set;
  	}

  }

?>