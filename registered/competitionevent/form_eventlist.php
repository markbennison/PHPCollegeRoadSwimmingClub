<!-- ---START--- Event List ---START--- -->
<div class="row mt-5">
    <div class="col">
        <h2>Events</h2>
    </div>
</div>

<div class="row">
  <div class="col">
    <?php
      $events = CompetitionEvent::find_eventtypes_by_competitionid($id);
      if (empty($events)) {
        echo('<tr><td colspan=9>No Events Recorded</td></tr>');
      }
      foreach($events as $event) { ?>
        <h4><?php echo h($event->name) . ' (' . h($event->date) . ')'; ?></h4>
        <p class="container ml-3"><?php echo 'Qualifying Time: ' . milliseconds_to_time($event->qualifyingtime); ?></p>
        <div class="container ml-5">
          <?php include('form_swimmerlist.php'); ?>
        </div>
      <?php } ?>

  </div>
</div>
<!-- ----END---- Event List ----END---- -->