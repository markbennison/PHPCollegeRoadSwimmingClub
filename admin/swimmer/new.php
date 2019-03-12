<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

if(is_post_request()) {
  // Create record using post parameters
  $args = $_POST['swimmer'];
  $swimmer = new Swimmer($args);
  $result = $swimmer->save();

  if($result === true) {
    $new_id = $swimmer->id;
    $_SESSION['message'] = 'The record was created successfully.';
    redirect_to(url_for('swimmer/show.php?id=' . $new_id));
  } else {
    // show errors
  }

} else {
  // display the form
  $swimmer = new Swimmer;
}

?>
<?php $page_title = 'Create Swimmer'; ?>
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

    <?php echo display_errors($swimmer->errors); ?>

    <form action="<?php echo url_for('swimmer/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
      <input class="btn btn-primary" type="submit" value="Add" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
