<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($swimmer)) {
  redirect_to(url_for('admin/swimmer/index.php'));
}
?>

<table id="formview" class="table table-sm table-borderless">
  <tr>
      <th>ID</th>
      <td><input type="text" name="swimmer[id]" value="[new]" disabled /></td>
  </tr>
  <tr>
      <th>Username</th>
      <td><input type="text" name="swimmer[username]" value="<?php echo h($swimmer->username); ?>" /></td>
  </tr>
  <tr>
      <th>Forename</th>
      <td><input type="text" name="swimmer[forename]" value="<?php echo h($swimmer->forename); ?>" /></td>
  </tr>
  <tr>
      <th>Surname</th>
      <td><input type="text" name="swimmer[surname]" value="<?php echo h($swimmer->surname); ?>" /></td>
  </tr>
  <tr>
      <th>Date of Birth</th>
      <td><input type="text" name="swimmer[dateofbirth]" value="<?php echo h($swimmer->dateofbirth); ?>" /></td>
  </tr>
  <tr>
      <th>Email</th>
      <td><input type="text" name="swimmer[email]" value="<?php echo h($swimmer->email); ?>" /></td>
  </tr>
  <tr>
      <th>Telephone</th>
      <td><input type="text" name="swimmer[telephone]" value="<?php echo h($swimmer->telephone); ?>" /></td>
  </tr>
  <tr>
      <th>Address 1</th>
      <td><input type="text" name="swimmer[address1]" value="<?php echo h($swimmer->address1); ?>" /></td>
  </tr>
  <tr>
      <th>Address 2</th>
      <td><input type="text" name="swimmer[address2]" value="<?php echo h($swimmer->address2); ?>" /></td>
  </tr>
  <tr>
      <th>City</th>
      <td><input type="text" name="swimmer[city]" value="<?php echo h($swimmer->city); ?>" /></td>
  </tr>
  <tr>
      <th>Post Code</th>
      <td><input type="text" name="swimmer[postcode]" value="<?php echo h($swimmer->postcode); ?>" /></td>
  </tr>
  <tr>
      <th>Role</th>
      <td><input type="text" name="swimmer[roleid]" value="<?php echo h($swimmer->roleid); ?>" /></td>
  </tr>
  <tr>
      <th>Registration Date</th>
      <td><input type="text" name="swimmer[registrationdate]" value="<?php echo h($swimmer->registrationdate); ?>" disabled/></td>
  </tr>
</table>