<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($event)) {
  redirect_to('/registered/trainingevent/index.php');
}
?>

<table id="formview" class="table table-sm table-borderless">
  <tr>
    <th>Event Selection</th>
    <td><select class="form-control" id="selecteventtype"  name="trainingevent[eventtypeid]" >

        <?php
        $eventtype = EventType::find_all();
        if (empty($eventtype)) {
          echo('<option value="">  </option>');
        }
        foreach($eventtype as $type) { ?>
          <option value="<?php echo h($type->id); ?>" <?php echo selected_item_compare($type->id, $event->eventtypeid); ?>><?php echo h($type->name); ?></option>
        <?php } ?>

    </select></td>
  <tr>
    <th>Swimmer</th>
    <td><select class="form-control" id="selecteventtype"  name="trainingevent[swimmerid]" >

        <?php
        $swimmers = Swimmer::find_swimmers_ordered();
        if (empty($swimmers)) {
          echo('<option value="">  </option>');
        }
        foreach($swimmers as $swimmer) { ?>
          <option value="<?php echo h($swimmer->id); ?>" <?php echo selected_item_compare($swimmer->id, $event->swimmerid); ?>>
              <?php echo h($swimmer->forename . ' ' . $swimmer->surname . ' (' . $swimmer->dateofbirth . ')'); ?>
          </option>
        <?php } ?>

    </select></td>

  </tr>
  <tr>
      <th>Date</th>
      <td><input type="text" name="trainingevent[date]" class="form-control" value="<?php echo h($event->date); ?>" /></td>
  </tr>
  <tr>
      <th>Time (ms)</th>
      <td><input type="text" name="trainingevent[time]" class="form-control" value="<?php echo h($event->time); ?>" />
      <small id="timeHelp" class="form-text text-muted">Time (measured in milliseconds) must be between 1,000 (1 second) and 3,600,000 (1 hour)</small></td>
  </tr>
</table>