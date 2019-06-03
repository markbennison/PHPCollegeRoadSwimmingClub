<!-- ---START--- Training Event List ---START--- -->
<div class="row mt-5">
    <div class="col-8 text-left">
        <h3>Training Events</h3>
    </div>
    <div class="col-4 text-right">
        <h3><a href="/registered/trainingevent" class=""><span class="fas fa-th-list"></span></a></h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Swim Time</th>
        <th>Qualifying Time</th>
        <th>Difference</th>
        <th>View</th>
      </tr>

<?php
    $trainingevents = TrainingEvent::find_trainingevents_by_swimmer($id);
    if (empty($trainingevents)) {
      echo('<tr><td colspan=9>No Training Events Recorded</td></tr>');
    }
    foreach($trainingevents as $trial) { ?>
      <tr class="<?php echo css_magnitude($trial->differential); ?>">
        <td><?php echo h($trial->id); ?></td>
        <td><?php echo h($trial->name); ?></td>
        <td><?php echo h($trial->date); ?></td>
        <td><?php echo milliseconds_to_time($trial->time); ?></td>
        <td><?php echo milliseconds_to_time($trial->qualifyingtime); ?></td>
        <td><?php echo milliseconds_to_time_magnitude($trial->differential); ?></td>
        <td class="text-center"><a href="<?php echo '/registered/trainingevent/show.php?id=' . h(u($trial->eventtypeid)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Training Event List ----END---- -->