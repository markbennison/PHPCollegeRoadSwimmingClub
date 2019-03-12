<?php #userlist.php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
?>
<?php $page_title = 'User List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="new.php" class=""><span class="fas fa-plus"></span></a>
        </h3>
    </div>
</div>

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
        <th>Edit</th>
        <th>Delete</th>
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
        <td class="text-center"><a href="<?php echo url_for('user/show.php?id=' . h(u($user->id))); ?>"><span class="fas fa-eye"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('user/edit.php?id=' . h(u($user->id))); ?>"><span class="fas fa-pen"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('user/delete.php?id=' . h(u($user->id))); ?>"><span class="fas fa-trash text-danger"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
