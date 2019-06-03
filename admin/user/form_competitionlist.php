<!-- ---START--- Competition Activity List ---START--- -->
<div class="row mt-5">
    <div class="col-8 text-left">
        <h3>Competition Activity</h3>
    </div>
    <div class="col-4 text-right">
        <h3><a href="/registered/competitionevent" class=""><span class="fas fa-th-list"></span></a></h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Event ID</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Heat</th>
        <th>Lane</th>
        <th>Status</th>
        <th>Place</th>
        <th>Swim Time</th>
        <th>View</th>
      </tr>
<?php
    $competitionevents = LaneAssignment::find_competitionevents_by_swimmer($id);
    if (empty($competitionevents)) {
      echo('<tr><td colspan=9>No Competition Events Recorded</td></tr>');
    }
    foreach($competitionevents as $event) { ?>
      <tr class="<?php echo css_race_place($event->place); ?>">
        <td><?php echo h($event->eventid); ?></td>
        <td><?php echo h($event->name); ?></td>
        <td><?php echo h($event->date); ?></td>
        <td><?php echo h($event->heatnumber); ?></td>
        <td><?php echo h($event->lanenumber); ?></td>
        <td><?php echo h($event->status); ?></td>
        <td><?php echo h($event->place); ?></td>
        <td><?php echo milliseconds_to_time($event->time); ?></td>
        
        <td class="text-center"><a href="<?php echo '/registered/competitionevent/show.php?id=' . h(u($event->competitionid)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>
<!-- ----END---- Training Event List ----END---- -->