<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('swimmer/index.php'));
}
$id = $_GET['id'];
$swimmer = Swimmer::find_by_id($id);
if($swimmer == false) {
  redirect_to(url_for('swimmer/index.php'));
}

if(is_post_request()) {

  // Delete swimmer
  $result = $swimmer->delete();
  $_SESSION['message'] = 'The record was deleted successfully.';
  redirect_to(url_for('swimmer/index.php'));

} else {
  // Display form
}

?>

<?php $page_title = 'Swimmer List'; ?>
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
    <p class="item"><?php echo h($swimmer->forename); ?> <?php echo h($swimmer->surname); ?></p>

    <form action="<?php echo url_for('swimmer/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
