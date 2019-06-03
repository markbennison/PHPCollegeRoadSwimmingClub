<?php
  require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
  require_coach();

  if(is_post_request()) {

    // Create record using post parameters
    $args = $_POST['trainingevent'];
    $event = new TrainingEvent($args);
    $result = $event->save();

    if($result === true) {
      $new_id = $event->id;
      $_SESSION['message'] = 'The record was created successfully.';
      redirect_to(url_for('/registered/trainingevent/show.php?id=' . $eventid));
    } else {
      // show errors
    }

  } else {
    // display the form
    $event = new TrainingEvent;
  }

?>
<?php $page_title = 'Create Event'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="index.php" class=""><span class="fas fa-th-list btn btn-primary"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">

    <?php echo display_errors($event->errors); ?>

    <form action="<?php echo url_for('/registered/trainingevent/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
      <input class="btn btn-primary" type="submit" value="Add" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
