<!-- ---START--- Child (User) List ---START--- -->
<div class="row mt-5">
<div class="col-8 text-left">
        <h3>Registered Children</h3>
    </div>
    <div class="col-4 text-right">
        <h3><a href="addparentchild.php" class=""><span class="fas fa-plus"></span></a></h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Child ID</th>
        <th>Username</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>Swimmer Accepted</th>
        <th>Parent Accepted</th>
        <th>View</th>
      </tr>

<?php
    $children = Swimmer::find_swimmer_children($id);
    if (empty($children)) {
      echo('<tr><td colspan=7>No Children Assigned</td></tr>');
    }
    foreach($children as $child) { ?>
      <tr>
        <td><?php echo h($child->id); ?></td>
        <td><?php echo h($child->username); ?></td>
        <td><?php echo h($child->forename); ?></td>
        <td><?php echo h($child->surname); ?></td>
        <td><?php echo h($child->gender); ?></td>
        <td><?php echo h($child->swimmerconfirmed); ?></td>
        <td><?php echo h($child->parentconfirmed); ?></td>
        <td class="text-center"><a href="<?php echo 'show.php?id=' . h(u($child->id)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Child (User) List ----END---- -->