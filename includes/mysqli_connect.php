<?php # mysqli_connect.php

// This file contains the database access information. 
// This file also establishes a connection to MySQL 
// and selects the database.

// Set the database access information as constants:
$DB_USER='root';
$DB_PASSWORD='';
$DB_HOST='localhost';
$DB_NAME='collegeroad';

// Make the connection:
$conn = mysqli_connect ($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

if (mysqli_connect_errno($conn)) {
 echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}

?>
