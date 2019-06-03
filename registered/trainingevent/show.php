<?php #userdetail.php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');
    require_login();

    $id = $_GET['id'] ?? false;
    if(!$id) {
        redirect_to('index.php');
    }
    $event = EventType::find_by_id($id);

    $page_title = 'Event Detail: ' . $event->name;
    include ($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>

<!-- ********** CONTENT AREA ********** -->
<div class="row">
    <div class="col-8 text-left">
        <h3>Event Type</h3>
    </div>
    <div class="col-4 text-right">
        <h3>
            <a href="new.php" class="<?php css_show_coach(); ?>"><span class="fas fa-plus btn btn-primary"></span></a>
            <a href="index.php" class=""><span class="fas fa-th-list btn btn-primary"></span></a>
        </h3>
    </div>
</div>

<!-- ---START--- Training Event (Event Type) Details ---START--- -->
<div class="row">
  <div class="col">
        <table id="formview" class="table table-sm table-borderless">
            <tr>
                <th>Event ID</th>
                <td><?php echo h($event->id); ?></td>
            </tr>
            <tr>
                <th>Event Name</th>
                <td><?php echo h($event->name); ?></td>
            </tr>
            <tr>
                <th>Qualifying Time</th>
                <td><?php echo milliseconds_to_time($event->qualifyingtime); ?> </td>
            </tr>
        </table>
    </div>
  </div>
<!-- ----END----  Training Event (Event Type) Details ----END---- -->

<?php 
    include('form_trainingeventlist.php'); 
?>

<?php // Include the HTML footer file:
include ($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>