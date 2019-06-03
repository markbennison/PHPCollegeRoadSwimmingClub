<?php #userlist.php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
  require_login();
?>
<?php $page_title = 'Training Event List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col-8 text-left">
        <h3>Event Types</h3>
    </div>
    <div class="col-4 text-right">
        <h3>
            <a href="new.php" class="<?php css_show_coach(); ?>"><span class="fas fa-plus btn btn-primary"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Event Name</th>
        <th>Qualifying Time</th>
        <th>View</th>
      </tr>

<?php
    $trainingevents = TrainingEvent::find_trainingeventtypes();
    if (empty($trainingevents)) {
      echo('<tr><td colspan=9>No Training Events Recorded</td></tr>');
    }
    foreach($trainingevents as $trial) { ?>
      <tr>
        <td><?php echo h($trial->name); ?></td>
        <td><?php echo milliseconds_to_time($trial->qualifyingtime); ?></td>
        <td class="text-center"><a href="<?php echo '/registered/trainingevent/show.php?id=' . h(u($trial->eventtypeid)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
