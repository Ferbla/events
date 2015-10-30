<?php
include 'functions/db/database.php';
include 'functions/event/event.php';

$conn = get_connection();

  if(isset($_POST['add-event'])){
    $test['name'] = $_POST['event_name'];
    $test['date'] = $_POST['event_date'];

    add_event($conn, $test);
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Events | Landing</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/style.css" rel="stylesheet">
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
        <h3>Events</h3>
        <?php

          $result = mysqli_query($conn, "SELECT event.event_name, event.event_date FROM events.event");
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
