<!-- ---START--- Training Event List ---START--- -->
<div class="row mt-5">
    <div class="col">
        <h3>Swimmer Trials</h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Trial ID</th>
        <th>Date</th>
        <th>Swimmer ID</th>
        <th>Swimmer Name</th>
        <th>Swim Time</th>
        <th>Qualifying Time</th>
        <th>Difference</th>
        <th>View</th>
        <th class="<?php css_show_coach(); ?>">Edit</th>
        <th class="<?php css_show_coach(); ?>">Delete</th>
      </tr>

<?php
    $trainingevents = TrainingEvent::find_trainingevents_by_type($id);
    if (empty($trainingevents)) {
      echo('<tr><td colspan=9>No Training Events Recorded</td></tr>');
    }
    foreach($trainingevents as $trial) { ?>
      <tr class="<?php echo css_magnitude($trial->differential); ?>">
        <td><?php echo h($trial->id); ?></td>
        <td><?php echo h($trial->date); ?></td>
        <td><?php echo h($trial->swimmerid); ?></td>
        <td><?php echo h($trial->forename . ' ' . $trial->surname); ?></td>
        <td><?php echo milliseconds_to_time($trial->time); ?></td>
        <td><?php echo milliseconds_to_time($trial->qualifyingtime); ?></td>
        <td><?php echo milliseconds_to_time_magnitude($trial->differential); ?></td>
        <td class="text-center"><a href="<?php echo '/registered/swimmer/show.php?id=' . h(u($trial->swimmerid)); ?>"><span class="fas fa-eye"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('/registered/trainingevent/edit.php?id=' . h(u($trial->id))); ?>"><span class="fas fa-pen <?php css_show_coach(); ?>"></span></a></td>
        <td class="text-center"><a href="<?php echo url_for('/registered/trainingevent/delete.php?id=' . h(u($trial->id))); ?>"><span class="fas fa-trash text-danger <?php css_show_coach(); ?>"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Training Event List ----END---- -->