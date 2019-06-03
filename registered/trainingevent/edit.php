<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
require_coach();

if(!isset($_GET['id'])) {
  redirect_to(url_for('index.php'));
}
$id = $_GET['id'];
$event = TrainingEvent::find_by_id($id);
if($event == false) {
  redirect_to(url_for('index.php'));
}


if(is_post_request()) {
  // Save record using post parameters
  $args = $_POST['trainingevent'];
  $event->merge_attributes($args);
  $result = $event->save();

  if($result === true) {
    $_SESSION['message'] = 'The record was updated successfully.';
    redirect_to(url_for('/registered/trainingevent/show.php?id=' . $event->eventtypeid));
  } else {
    // show errors
  }
} else {
  // display the form
}

?>
<?php $page_title = 'Edit Event'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="index.php" class=""><span class="fas fa-times"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <?php echo display_errors($event->errors); ?>

    <form action="<?php echo '/registered/trainingevent/edit.php?id=' . h(u($event->id)); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input class="btn btn-primary" type="submit" value="Save" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
