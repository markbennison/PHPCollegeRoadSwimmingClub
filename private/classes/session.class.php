<?php

class Session {

  public $user_id;
  public $username;
  public $forename;
  public $roleid;
  public $dateofbirth;
  private $last_login;

  public const MAX_LOGIN_AGE = 60*60*24; // 1 day

  public function __construct() {
    session_start();
    $this->check_stored_login();
  }

  public function login($user) {
    if($user) {
      // prevent session fixation attacks
      session_regenerate_id();
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->username = $_SESSION['username'] = $user->username;
      $this->forename = $_SESSION['forename'] = $user->forename;
      $this->roleid = $_SESSION['roleid'] = $user->roleid;
      $this->roleid = $_SESSION['dateofbirth'] = $user->dateofbirth;
      $this->last_login = $_SESSION['last_login'] = time();
    }
    return true;
  }

  public function is_logged_in() {
    // return isset($this->user_id);
    return isset($this->user_id) && $this->last_login_is_recent();
  }

  public function is_adult() {
    if (isset($this->user_id)){
      //$this->dateofbirth
      $date = new DateTime($this->dateofbirth);
      $now = new DateTime();
      $interval = $now->diff($date);
      $age = $interval->y;
      if ($age >= 18) {
        return true;
      }
    }
    return false;
  }

  public function logout() {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['forename']);
    unset($_SESSION['roleid']);
    unset($_SESSION['dateofbirth']);
    unset($_SESSION['last_login']);
    unset($this->user_id);
    unset($this->username);
    unset($this->forename);
    unset($this->roleid);
    unset($this->last_login);
    return true;
  }

  private function check_stored_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->username = $_SESSION['username'];
      $this->forename = $_SESSION['forename'];
      $this->roleid = $_SESSION['roleid'];
      $this->dateofbirth = $_SESSION['dateofbirth'];
      $this->last_login = $_SESSION['last_login'];
    }
  }

  private function last_login_is_recent() {
    if(!isset($this->last_login)) {
      return false;
    } elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()) {
      return false;
    } else {
      return true;
    }
  }

  public function message($msg="") {
    if(!empty($msg)) {
      // Then this is a "set" message
      $_SESSION['message'] = $msg;
      return true;
    } else {
      // Then this is a "get" message
      return $_SESSION['message'] ?? '';
    }
  }

  public function clear_message() {
    unset($_SESSION['message']);
  }
}

?>
