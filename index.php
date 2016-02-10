<?php
include_once 'inc/head.php';
include_once 'functions/db/database.php';
include_once 'functions/event/event.php';

$conn = get_connection();

  if(isset($_POST['add-event'])){
    $event['name'] = $_POST['event_name'];
    $event['date'] = $_POST['event_date'];

    add_event($conn, $event);
    header('Refresh:0');
  }

  if(isset($_GET['del'])) {
    $event_id = html_entity_decode($_GET['del']);
    $result = delete_event($conn, $event_id);

    unset($_GET['del']);
    header('Location: index.php');
  }

  if(isset($_POST['btn_edit'])){
    $event_data['event_name'] = $_POST['event_name'];
    $event_data['event_date'] = $_POST['event_date'];
    $event_data['event_id'] = $_GET['edit'];

    $result = edit_event($conn, $event_data);

    unset($_GET['edit']);
    header("Location: index.php");
  }

?>

    <div class="main">
      <?php
        if(isset($_GET['edit'])){
          $event_id = html_entity_decode($_GET['edit']);
          $event_data = get_event_data($conn, $event_id);
      ?>
        <div id="edit-event" class="edit-event">
          <!-- Container to edit new event -->
          <legend>Edit Event</legend>

          <div class="row">
            <form method="post">
              <div class="col-xs-12">
                <input name="event_name" class="form-control" type="text" placeholder="Event Name" value="<?php echo $event_data['event_name'] ?>">
                <br />
                <input name="event_date" class="form-control" type="date" value="<?php echo $event_data['event_date'] ?>">

                <hr />

                <button id="btn_edit" name="btn_edit" class="btn pull-right" type="submit">Edit</button>
              </div>
            </form>
          </div>
          <br />
        </div>
      <?php
        } else {
      ?>
        <div class="button-right">
          <button id="add" class="btn"><span class="glyphicon glyphicon-plus"></span></button>
        </div>

        <div id="add-event" class="add-event">
          <!-- Container to add new event -->
          <legend>Add Event</legend>

          <div class="row">
            <form method="post">
              <div class="col-xs-12">
                <input name="event_name" class="form-control" type="text" placeholder="Event Name">
                <br />
                <input name="event_date" class="form-control" type="date">
              </div>

              <button id="add-event" name="add-event" class="btn pull-right" type="submit">Submit</button>

            </form>
          </div>
          <br />

        </div>

      <?php } ?>

      <div class="display-event">
        <!-- Container to display events -->
        <legend>Events</legend>
        <?php

          $result = mysqli_query($conn, "SELECT event.event_id, event.event_name, event.event_date FROM events.event");
          display_event($result);

          mysqli_close($conn);
        ?>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){

        $( "#add" ).click(function(){
          $("#add-event").toggle();
        });

      });
    </script>

  </body>
</html>
