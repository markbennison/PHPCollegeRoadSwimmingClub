<?php

function url_for($script_path) {
  // add the leading '/' if not present
  //if($script_path[0] != '/') {
  //  $script_path = "/" . $script_path;
  //}
  if($script_path[0] == '/') {
    $script_path = substr($script_path, 1);
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function milliseconds_to_time($time_in_ms) {
  $returnstring = '';
  $cumulative_time = $time_in_ms;

  $min = floor($time_in_ms / 60000);
  if ($min < 10){
    $returnstring .= '0' . $min;
  }else{
    $returnstring .= $min;
  }

  $cumulative_time -= ($min * 60000);

  $sec = floor($cumulative_time / 1000);
  if ($sec < 10){
    $returnstring .= ':0' . $sec;
  }else{
    $returnstring .= ':' . $sec;
  }

  $cumulative_time -= ($sec * 1000);

  $ms = $cumulative_time/10;
  if ($ms < 10){
    $returnstring .= '.0' . $ms;
  }else{
    $returnstring .= '.' . $ms;
  }

  return $returnstring;
}

function milliseconds_to_time_magnitude($time_in_ms) {
  
  if ($time_in_ms == 0) {
    return '0:00.0';
  }else if ($time_in_ms < 0) {
    $time_in_ms *= -1;
    $returnstring = '- ' . milliseconds_to_time($time_in_ms);
  }else{
    $returnstring = '+ ' . milliseconds_to_time($time_in_ms);;
  }
  return $returnstring;
}

function dateofbirth_to_age($dob) {
  $date = new DateTime($dob);
  $now = new DateTime();
  $interval = $now->diff($date);
  return $interval->y;
}

function css_magnitude($value) {
  if ($value < 0) {
    //return 'text-danger';
    //return 'table-danger';
  }else{
    //return 'text-success';
    return 'table-success';
  }
}

function css_race_place($value) {
  if ($value == 1) {
    return 'table-warning';
  }else{
    //return 'text-success';
    //return 'table-success';
  }
}

function selected_item_compare($value, $comparator) {
  if ($value == $comparator) {
    return 'selected';
  }else{
    //return nothing;
    return;
  }
}

// PHP on Windows does not have a money_format() function.
// This is a super-simple replacement.
if(!function_exists('money_format')) {
  function money_format($format, $number) {
    return '£' . number_format($number, 2);
  }
}

?>
