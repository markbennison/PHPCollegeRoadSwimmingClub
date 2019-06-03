<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to('/registered/account/index.php');
}
?>

<table id="formview" class="table table-sm table-borderless">
  <tr>
      <th>ID</th>
      <td><input type="text" name="user[id]" class="form-control" value="<?php echo h($user->id); ?>" disabled /></td>
  </tr>
  <tr>
      <th>Username</th>
      <td><input type="text" name="user[username]" class="form-control" value="<?php echo h($user->username); ?>" /></td>
  </tr>
  <tr>
      <th>Password</th>
      <td><input type="text" name="user[plain_password]" class="form-control" value="<?php echo h($user->plain_password); ?>" /></td>
  </tr>
  <tr>
      <th>Confirm Password</th>
      <td><input type="text" name="user[confirm_password]" class="form-control" value="<?php echo h($user->confirm_password); ?>" /></td>
  </tr>
  <tr>
      <th>Forename</th>
      <td><input type="text" name="user[forename]" class="form-control" value="<?php echo h($user->forename); ?>" /></td>
  </tr>
  <tr>
      <th>Surname</th>
      <td><input type="text" name="user[surname]" class="form-control" value="<?php echo h($user->surname); ?>" /></td>
  </tr>
  <tr>
      <th>Date of Birth</th>
      <td><input type="text" name="user[dateofbirth]" class="form-control" value="<?php echo h($user->dateofbirth); ?>" /></td>
  </tr>
  <tr>
      <th>Gender</th>
      <td><select name="user[gender]" class="form-control">
      <?php foreach(User::GENDER_OPTIONS as $gender) { ?>
      <option value="<?php echo $gender; ?>" <?php if($user->gender == $gender) { echo 'selected'; } ?>><?php echo $gender; ?></option>
    <?php } ?>
    </select></td>  </tr>
  <tr>
      <th>Email</th>
      <td><input type="text" name="user[email]" class="form-control" value="<?php echo h($user->email); ?>" /></td>
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
      <th>Role</th>
      <td><select name="user[roleid]" class="form-control" disabled>
    <?php foreach(User::ROLE_OPTIONS as $roleid => $role) { ?>
      <option value="<?php echo $role; ?>" <?php if($user->roleid == $roleid) { echo 'selected'; } ?>><?php echo $role; ?></option>
    <?php } ?>
    </select></td>
  </tr>
  <tr>
      <th>Registration Date</th>
      <td><input type="text" name="user[registrationdate]" class="form-control" value="<?php echo h($user->registrationdate); ?>" disabled /></td>
  </tr>
</table>