<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

// Log out the admin
$session->logout();

redirect_to('/login.php');

?>
