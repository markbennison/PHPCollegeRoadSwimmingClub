<?php #login.php ?>
<?php $page_title = 'Login'; ?>
<?php include('includes/header.php'); ?>

<?php
if (isset($_POST['submitted'])) {
	require_once ('includes/mysqli_connect.php');
   
    $email=trim($_POST['email']);
    $pass=trim($_POST['pass']);
	
	// Validate the email address:
	if (!empty($email)) {
		$e = mysqli_real_escape_string ($conn, $email);
	} else {
		$e = FALSE;
		echo '<p class="error">You forgot to enter your email address!</p>';
	}
	
	// Validate the password:
	if (!empty($pass)) {
		$p = mysqli_real_escape_string ($conn, $pass);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password!</p>';
	}
	
	if ($e && $p) { // If everything's OK.
	
    
		// Query the database for the hashed password:
		$q = "SELECT password, forename FROM user WHERE (email='$e')";		
		$r = mysqli_query ($conn, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($conn));
		
		if (mysqli_num_rows($r) == 1) { // A match was made.

			// Register the values & redirect:
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 
			mysqli_free_result($r);
			mysqli_close($conn);
            $hash = $_SESSION['password'];
         
			if (password_verify($p, $hash)){
            
                echo "logged in - hurrah!";  
                
                $url = 'loggedin.php'; // Define the URL:
                ob_end_clean(); // Delete the buffer.
                header("Location: $url");


                exit(); // Quit the script.
                } else{//passwords don't match'
                            echo '<p class="error">The password entered does not match the one on file or you have not yet activated your account.</p>';
                    unset($_SESSION['forename']);
                    unset($_SESSION['password']);
               
                }
        
		} else { // No match was made.
			echo '<p class="error">Either the email address and password entered do not match those on file or you have not yet activated your account.</p>';
         
  
		}
        
	} else { // If everything wasn't OK.
		echo '<p class="error">Please try again.</p>';
        mysqli_close($conn);
	}
	


} // End of SUBMIT conditional.
?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
	<div class="col">
		<p>Your browser must allow cookies in order to log in.</p>
		<form action="login.php" method="post">
			<fieldset>
			<p><b>Email Address:</b> <input type="text" name="email" size="20" maxlength="40" /></p>
			<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>
			<div class="text-center"><input type="submit" name="submit" value="Login" /></div>
			<input type="hidden" name="submitted" value="TRUE" />
			</fieldset>
		</form>
	</div>
</div>

<?php 	include('includes/footer.php'); ?>