<!-- ---START--- Swimmmer Event List ---START--- -->
<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Heat</th>
        <th>Lane</th>
        <th>Swimmer ID</th>
        <th>Swimmer Name</th>
        <th>Swim Time</th>
        <th>Status</th>
        <th>Place</th>
        <th>View</th>
      </tr>
<?php
    $swimmers = LaneAssignment::find_swimmers_by_eventid($event->id);
    if (empty($swimmers)) {
      echo('<tr><td colspan=9>No Swimmers Found</td></tr>');
    }
    foreach($swimmers as $swimmer) { ?>
      <tr class="<?php echo css_race_place($swimmer->place); ?>">
        <td><?php echo h($swimmer->heatnumber); ?></td>
        <td><?php echo h($swimmer->lanenumber); ?></td>
        <td><?php echo h($swimmer->swimmerid); ?></td>
        <td><?php echo h($swimmer->forename) . ' ' . h($swimmer->surname); ?></td>
        <td><?php echo milliseconds_to_time($swimmer->time); ?></td>
        <td><?php echo h($swimmer->status); ?></td>
        <td><?php echo h($swimmer->place); ?></td>
        <td class="text-center"><a href="<?php echo '/registered/swimmer/show.php?id=' . h(u($swimmer->swimmerid)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Swimmmer Event List ----END---- -->