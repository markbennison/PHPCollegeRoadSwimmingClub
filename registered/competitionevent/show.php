<?php #userdetail.php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
    require_login();

    $id = $_GET['id'] ?? false;
    if(!$id) {
        redirect_to('index.php');
    }
    $competition = Competition::find_by_id($id);

    $page_title = 'Competition: ' . $competition->title;
    include($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col-8 text-left">
        <h3>Competition Details</h3>
    </div>
    <div class="col-4 text-right">
        <h3>
            <a href="index.php" class=""><span class="fas fa-th-list btn btn-primary"></span></a>
        </h3>
    </div>
</div>

<!-- ---START--- Competition Details ---START--- -->
<div class="row">
  <div class="col">
        <table id="formview" class="table table-sm table-borderless">
            <tr>
                <th>ID</th>
                <td><?php echo h($competition->id); ?></td>
            </tr>
            <tr>
                <th>Competition Name</th>
                <td><?php echo h($competition->title); ?></td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td><?php echo h($competition->startdate); ?></td>
            </tr>
        </table>
    </div>
  </div>
<!-- ----END----  Competition Details ----END---- -->

<?php 
    include('form_eventlist.php'); 
?>

<?php // Include the HTML footer file:
include($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>