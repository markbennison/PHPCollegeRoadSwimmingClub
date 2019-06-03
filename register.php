<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $_SESSION['message'] = 'Thank you for registering.';
    redirect_to(url_for('/index.php'));
  } else {
    // show errors
  }

} else {
  // display the form
  $user = new User;
}

?>
<?php $page_title = 'Register'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col">
        <h3>Personal Details</h3>
    </div>
</div>

<div class="row">
  <div class="col">

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('/register.php'); ?>" method="post">

    <table id="formview" class="table table-sm table-borderless">
  <tr>
      <th>ID</th>
      <td><input type="text" name="user[id]" class="form-control" value="<?php echo h($user->id); ?>" disabled /></td>
  </tr>
  <tr>
      <th>Username</th>
      <td><input type="text" name="user[username]" class="form-control" value="<?php echo h($user->username); ?>" />
      <small id="usernameHelp" class="form-text text-muted">Username must be between 8 and 255 characters, and unique to College Road Swimming Club</small></td>
  </tr>
  <tr>
      <th>Password</th>
      <td><input type="password" name="user[plain_password]" class="form-control" value="<?php echo h($user->plain_password); ?>" /></td>
  </tr>
  <tr>
      <th>Confirm Password</th>
      <td><input type="password" name="user[confirm_password]" class="form-control" value="<?php echo h($user->confirm_password); ?>" />
        <small id="passwordHelp" class="form-text text-muted">Passwords must contain 8 or more characters and include:
      <br /> 1 or more uppercase characters,
      <br /> 1 or more lowercase, 
      <br /> 1 or more numbers, and 
      <br /> 1 or more special characters</small></td>
  </tr>
  <tr>
      <th>Forename</th>
      <td><input type="text" name="user[forename]" class="form-control" value="<?php echo h($user->forename); ?>" />
      <small id="forenameHelp" class="form-text text-muted">Forename must be between 2 and 30 characters</small></td>
  </tr>
  <tr>
      <th>Surname</th>
      <td><input type="text" name="user[surname]" class="form-control" value="<?php echo h($user->surname); ?>" />
      <small id="surnameHelp" class="form-text text-muted">Surname must be between 2 and 30 characters</small></td>
  </tr>
  <tr>
      <th>Date of Birth</th>
      <td><input type="text" name="user[dateofbirth]" class="form-control" value="<?php echo h($user->dateofbirth); ?>" />
      <small id="emailHelp" class="form-text text-muted">Currently as yyyy-mm-dd.</small></td>
  </tr>
  <tr>
      <th>Gender</th>
      <td><select name="user[gender]" class="form-control">
      <?php foreach(User::GENDER_OPTIONS as $gender) { ?>
      <option value="<?php echo $gender; ?>" <?php if($user->gender == $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
    <?php } ?>
    </select></td>
  </tr>
  <tr>
      <th>Email</th>
      <td><input type="text" name="user[email]" class="form-control" value="<?php echo h($user->email); ?>" />
      <small id="emailHelp" class="form-text text-muted">Email must be of a valid format and less than 128 characters.</small></td>
  </tr>
  <tr>
      <th>Telephone</th>
      <td><input type="text" name="user[telephone]" class="form-control" value="<?php echo h($user->telephone); ?>" /></td>
  </tr>
  <tr>
      <th>Address 1</th>
      <td><input type="text" name="user[address1]" class="form-control" value="<?php echo h($user->address1); ?>" /></td>
  </tr>
  <tr>
      <th>Address 2</th>
      <td><input type="text" name="user[address2]" class="form-control" value="<?php echo h($user->address2); ?>" /></td>
  </tr>
  <tr>
      <th>City</th>
      <td><input type="text" name="user[city]" class="form-control" value="<?php echo h($user->city); ?>" /></td>
  </tr>
  <tr>
      <th>Post Code</th>
      <td><input type="text" name="user[postcode]" class="form-control" value="<?php echo h($user->postcode); ?>" /></td>
  </tr>
  <tr>
      <th>Role (Preset to 'Guest')</th>
      <td><select name="user[roleid]" class="form-control" disabled>
    <?php foreach(User::ROLE_OPTIONS as $roleid => $role) { ?>
      <option value="<?php echo $role; ?>" <?php if($user->roleid == $roleid) { echo 'selected'; } ?>><?php echo $role; ?></option>
    <?php } ?>
    </select></td>
  </tr>
  <tr>
      <th>Registration Date</th>
      <td><input type="text" name="user[registrationdate]" class="form-control" value="<?php echo h($user->registrationdate); ?>" disabled/></td>
  </tr>
</table>

      <div id="operations">
      <input class="btn btn-primary" type="submit" value="Register" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
