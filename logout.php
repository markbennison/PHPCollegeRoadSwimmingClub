<?php # logout.php ?>
<?php $page_title = 'Logout'; ?>
<?php include('includes/header.php'); ?>

<?php
// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['forename'])) {

	$url = 'index.php'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-300); // Destroy the cookie.

}
?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
	<div class="col">
		<p>You are now logged out.</p>
	</div>
</div>

<?php 	include('includes/footer.php'); ?>