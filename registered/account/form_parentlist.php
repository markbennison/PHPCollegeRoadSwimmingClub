<!-- ---START--- Parent (User) List ---START--- -->
<div class="row mt-5">
  <div class="col-8 text-left">
        <h3>Registered Parents</h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Parent ID</th>
        <th>Username</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>Swimmer Accepted</th>
        <th>Parent Accepted</th>
        <th>View</th>
      </tr>

<?php
    $parents = Swimmer::find_swimmer_parents($id);
    if (empty($parents)) {
      echo('<tr><td colspan=7>No Parents Assigned</td></tr>');
    }
    foreach($parents as $parent) { ?>
      <tr>
        <td><?php echo h($parent->id); ?></td>
        <td><?php echo h($parent->username); ?></td>
        <td><?php echo h($parent->forename); ?></td>
        <td><?php echo h($parent->surname); ?></td>
        <td><?php echo h($parent->gender); ?></td>
        <td><?php echo h($parent->swimmerconfirmed); ?></td>
        <td><?php echo h($parent->parentconfirmed); ?></td>
        <td class="text-center"><a href="<?php echo '../swimmer/show.php?id=' . h(u($parent->parentid)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Parent (User) List ----END---- -->