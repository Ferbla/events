<?php
include 'functions/db/database.php';
include 'functions/event/event.php';

$conn = get_connection();

  if(isset($_POST['add-event'])){

    print $_POST['event_name'];
    print $_POST['event_date'];
    $test['name'] = $_POST['event_name'];
    $test['date'] = $_POST['event_date'];

    add_event($conn, $test);

    //unset($_POST);
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Events | Landing</title>

    <link href="css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="main">

      <div class="button-right">
        <button id="add" class="btn">Add Event</button>
      </div>

      <div id="add-event" class="add-event">
        <!-- Container to add new event -->
        <legend>Add Event</legend>
        <form method="post">
          <input name="event_name" class="form-item" type="text" placeholder="Event Name">
          <input name="event_date" class="form-item" type="date">

          <div class="button-right">
            <br />
            <button id="add-event" name="add-event" class="btn" type="submit">Submit</button>
          </div>
        </form>
      </div>

      <div class="display-event">
        <!-- Container to display events -->
        <hr />
        <p>Display</p>
        <?php

          $result = mysqli_query($conn, "SELECT event.event_name, event.event_date FROM events.event");
          display_event($result);

          mysqli_close($conn);
        ?>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){

        $( "#add" ).click(function(){
          $("#add-event").toggle();
        });

      });
    </script>

  </body>
</html>
