<?php

function require_login() {
  global $session;
  if(!$session->is_logged_in()) {
    redirect_to('/login.php');
  }
}

function require_coach() {
  global $session;
  if(!$session->is_logged_in() || $session->roleid < 4) {
    redirect_to('/index.php');
  }
}

function require_admin() {
  global $session;
  if(!$session->is_logged_in() || $session->roleid < 5) {
    redirect_to('/index.php');
  }
}

function require_adult() {
  global $session;
  if(!$session->is_logged_in() || !$session->is_adult()) {
    redirect_to('/index.php');
  }
}

function css_show_admin() {
  global $session;
  if($session->roleid < 5) {
    echo "d-none";
  }
}

function css_show_coach() {
  global $session;
  if($session->roleid < 4) {
    echo "d-none";
  }
}

function css_hide_child() {
  global $session;
  if(!$session->is_adult()) {
    echo "d-none";
  }
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function display_session_message() {
  $msg = get_and_clear_session_message();
  if(isset($msg) && $msg != '') {
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
