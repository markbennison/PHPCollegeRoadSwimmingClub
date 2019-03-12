<?php #userdetail.php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/private/initialise.php');

    $id = $_GET['id'] ?? false;
    if(!$id) {
        redirect_to('index.php');
    }
    $user = User::find_by_id($id);

    $page_title = 'User Detail: ' . $user->forename . ' ' . $user->surname;
    include ($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>

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
        <table id="formview" class="table table-sm table-borderless">
            <tr>
                <th>ID</th>
                <td><?php echo h($user->id); ?></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><?php echo h($user->username); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo h($user->forename); ?> <?php echo h($user->surname); ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo h($user->dateofbirth); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo h($user->email); ?></td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td><?php echo h($user->telephone); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo h($user->address1); ?><br />
                    <?php echo h($user->address2); ?><br />
                    <?php echo h($user->city); ?><br />
                    <?php echo h($user->postcode); ?></td>
            </tr>
            <tr>
                <th>Role</th>
                <td><?php echo h($user->roleid); ?></td>
            </tr>
            <tr>
                <th>Registration Date</th>
                <td><?php echo h($user->registrationdate); ?></td>
            </tr>
        </table>
    </div>
  </div>

<?php // Include the HTML footer file:
include ($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>