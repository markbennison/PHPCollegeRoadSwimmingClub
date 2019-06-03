<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

  $errors = [];
  $username = '';
  $password = '';

  if(is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if(empty($errors)) {
      $user = User::find_by_username($username);
      // test if user found and password is correct
      if($user != false && $user->verify_password($password)) {
        // Mark user as logged in
        $session->login($user);
        redirect_to('/index.php');
      } else {
        // username not found or password does not match
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }

  $page_title = 'Login';
  include ($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>
  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
  <div class="form-group">
  <label for="username">Username: </label>
      <input type="text" name="username" class="form-control" value="<?php echo h($username); ?>" />
      <small id="usernameHelp" class="form-text text-muted">This may be your email address.</small>
      </div>
      <div class="form-group">
      <label for="username">Password: </label>
      <input type="password" name="password" class="form-control" value="" />
      </div>
      <input type="submit" name="submit" value="Submit" class="btn btn-primary" />
    </table>
  </form>

<?php // Include the HTML footer file:
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
