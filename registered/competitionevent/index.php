<?php #userlist.php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
  require_login();
?>
<?php $page_title = 'Competition List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Start Date</th>
        <th>View</th>
      </tr>

<?php
    $competitions = Competition::find_all();
    if (empty($competitions)) {
      echo('<tr><td colspan=9>No Competitions Recorded</td></tr>');
    }
    foreach($competitions as $competition) { ?>
      <tr>
        <td><?php echo h($competition->id); ?></td>
        <td><?php echo h($competition->title); ?></td>
        <td><?php echo h($competition->startdate); ?></td>
        <td class="text-center"><a href="<?php echo '/registered/competitionevent/show.php?id=' . h(u($competition->id)); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
