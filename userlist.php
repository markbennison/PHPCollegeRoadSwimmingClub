<?php #userlist.php
    require_once ('/private/initialise.php');
    $page_title = 'User List';
    include ('/includes/header.html');
?>
<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>DoB</th>
        <th>Role</th>
        <th>Reg Date</th>
        <th>View</th>
      </tr>

<?php
    $users = User::find_all();
?>
      <?php foreach($users as $user) { ?>
      <tr>
        <td><?php echo h($user->id); ?></td>
        <td><?php echo h($user->username); ?></td>
        <td><?php echo h($user->forename); ?></td>
        <td><?php echo h($user->surname); ?></td>
        <td><?php echo h($user->dateofbirth); ?></td>
        <td><?php echo h($user->roleid); ?></td>
        <td><?php echo h($user->registrationdate); ?></td>
        <td><a href="user/show.php?id=<?php echo $user->id; ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>