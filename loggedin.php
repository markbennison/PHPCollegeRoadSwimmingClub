<?php #loggedin.php ?>
<?php $page_title = 'Logged in'; ?>
<?php include('includes/header.php'); ?>

<?php
	// If no first_name session variable exists, redirect the user:
	if (!isset($_SESSION['firstName'])) {
		$url = 'index.php'; // Define the URL.
		ob_end_clean(); // Delete the buffer.
		header("Location: $url");
		exit(); // Quit the script.
	} else { 
		// Print a customized message:
		echo '<h3>You are now logged in.</h3>';
	}
?>

<?php 	include('includes/footer.php'); ?>