<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('admin/user/index.php'));
}
?>

<table id="formview" class="table table-sm table-borderless">
  <tr>
      <th>ID</th>
      <td><input type="text" name="user[id]" value="[new]" disabled /></td>
  </tr>
  <tr>
      <th>Username</th>
      <td><input type="text" name="user[username]" value="<?php echo h($user->username); ?>" /></td>
  </tr>
  <tr>
      <th>Forename</th>
      <td><input type="text" name="user[forename]" value="<?php echo h($user->forename); ?>" /></td>
  </tr>
  <tr>
      <th>Surname</th>
      <td><input type="text" name="user[surname]" value="<?php echo h($user->surname); ?>" /></td>
  </tr>
  <tr>
      <th>Date of Birth</th>
      <td><input type="text" name="user[dateofbirth]" value="<?php echo h($user->dateofbirth); ?>" /></td>
  </tr>
  <tr>
      <th>Email</th>
      <td><input type="text" name="user[email]" value="<?php echo h($user->email); ?>" /></td>
  </tr>
  <tr>
      <th>Telephone</th>
      <td><input type="text" name="user[telephone]" value="<?php echo h($user->telephone); ?>" /></td>
  </tr>
  <tr>
      <th>Address 1</th>
      <td><input type="text" name="user[address1]" value="<?php echo h($user->address1); ?>" /></td>
  </tr>
  <tr>
      <th>Address 2</th>
      <td><input type="text" name="user[address2]" value="<?php echo h($user->address2); ?>" /></td>
  </tr>
  <tr>
      <th>City</th>
      <td><input type="text" name="user[city]" value="<?php echo h($user->city); ?>" /></td>
  </tr>
  <tr>
      <th>Post Code</th>
      <td><input type="text" name="user[postcode]" value="<?php echo h($user->postcode); ?>" /></td>
  </tr>
  <tr>
      <th>Role</th>
      <td><input type="text" name="user[roleid]" value="<?php echo h($user->roleid); ?>" /></td>
  </tr>
  <tr>
      <th>Registration Date</th>
      <td><input type="text" name="user[registrationdate]" value="<?php echo h($user->registrationdate); ?>" /></td>
  </tr>
</table>