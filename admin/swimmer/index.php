<?php #userlist.php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
?>
<?php $page_title = 'Swimmer List'; ?>
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
    $swimmers = Swimmer::find_all();
?>
      <?php foreach($swimmers as $swimmer) { ?>
      <tr>
        <td><?php echo h($swimmer->id); ?></td>
        <td><?php echo h($swimmer->username); ?></td>
        <td><?php echo h($swimmer->forename); ?></td>
        <td><?php echo h($swimmer->surname); ?></td>
        <td><?php echo h($swimmer->dateofbirth); ?></td>
        <td><?php echo h($swimmer->roleid); ?></td>
        <td><?php echo h($swimmer->registrationdate); ?></td>
        <td class="text-center"><a href="<?php echo url_for('swimmer/show.php?id=' . h(u($swimmer->id))); ?>"><span class="fas fa-eye"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('swimmer/edit.php?id=' . h(u($swimmer->id))); ?>"><span class="fas fa-pen"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('swimmer/delete.php?id=' . h(u($swimmer->id))); ?>"><span class="fas fa-trash text-danger"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>
