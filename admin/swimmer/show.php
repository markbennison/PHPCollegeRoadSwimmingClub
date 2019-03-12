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

<!-- ---------- Swimmer (User) Details ---------- -->
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

<!-- ---------- Parent (User) List ---------- -->
<div class="row">
    <div class="col text-right">
        <h3>
            <a href="new.php" class=""><span class="fas fa-plus"></span></a>
        </h3>
    </div>
</div>

<div class="row">
  <div class="col">
    <table id="listview" class="table table-condensed">
      <tr>
        <th>Parent ID</th>
        <th>Username</th>
        <th>Forename</th>
        <th>Surname</th>
        <th>Swimmer Accepted</th>
        <th>Parent Accepted</th>
        <th>View</th>
      </tr>

<?php
    $parents = Swimmer::find_swimmer_parents($id);
    if (empty($parents)) {
echo('No Parents Assigned');
    }
    foreach($parents as $parent) { ?>
      <tr>
        <td><?php echo h($parent->parentid); ?></td>
        <td><?php echo h($parent->username); ?></td>
        <td><?php echo h($parent->forename); ?></td>
        <td><?php echo h($parent->surname); ?></td>
        <td><?php echo h($parent->swimmerconfirmed); ?></td>
        <td><?php echo h($parent->parentconfirmed); ?></td>
        <td class="text-center"><a href="<?php echo url_for('../admin/user/show.php?id=' . h(u($parent->parentid))); ?>"><span class="fas fa-eye"></span></a></td>
      </tr>
      <?php } ?>

    </table>
  </div>
</div>

<?php // Include the HTML footer file:
include ($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>