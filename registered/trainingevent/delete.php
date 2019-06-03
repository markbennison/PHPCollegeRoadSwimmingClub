<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
require_coach();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/registered/trainingevent/index.php'));
}
$id = $_GET['id'];
$event = TrainingEvent::find_by_id($id);
if($event == false) {
  redirect_to(url_for('/registered/trainingevent/index.php'));
}

if(is_post_request()) {

  // Delete event
  $result = $event->delete();
  $_SESSION['message'] = 'The record was deleted successfully.';
  redirect_to(url_for('/registered/trainingevent/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Event List'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="index.php" class=""><span class="fas fa-th-list"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <p>Are you sure you want to delete this record?</p>
    <p class="item">Event #<?php echo h($event->id); ?> with swimmer #<?php echo h($event->swimmerid); ?> (Time: <?php echo h($event->time); ?>)</p>

    <form action="<?php echo url_for('/registered/trainingevent/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
