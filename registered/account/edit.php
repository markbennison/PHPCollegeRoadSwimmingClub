<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
require_adult();
$id = $session->user_id;
$user = User::find_by_id($id);
if($user == false) {
  redirect_to(url_for('/index.php'));
}

if(is_post_request()) {
  // Save record using post parameters
  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if($result === true) {
    $_SESSION['message'] = 'The record was updated successfully.';
    redirect_to(url_for('/registered/account/index.php?id=' . $id));
  } else {
    // show errors
  }
} else {
  // display the form
}

?>
<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="index.php" class=""><span class="fas fa-times btn btn-primary"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo '/registered/account/edit.php?id=' . h(u($id)); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input class="btn btn-primary" type="submit" value="Save" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
