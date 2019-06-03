<?php #userlist.php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
  require_login();
?>
<?php $page_title = 'Swimmer List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Reg Date</th>
        <th>View</th>
      </tr>

<?php
    $swimmers = Swimmer::find_by_roleid(2);
?>
      <?php foreach($swimmers as $swimmer) { ?>
      <tr>
        <td><?php echo h($swimmer->id); ?></td>
        <td><?php echo h($swimmer->username); ?></td>
        <td><?php echo h($swimmer->forename); ?></td>
        <td><?php echo h($swimmer->surname); ?></td>
        <td><?php echo dateofbirth_to_age($swimmer->dateofbirth); ?></td>
        <td><?php echo h($swimmer->registrationdate); ?></td>
        <td class="text-center"><a href="<?php echo 'show.php?id=' . h(u($swimmer->id)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
