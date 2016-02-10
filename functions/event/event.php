<?php
function add_event($con, $val)
{
  $name = mysqli_real_escape_string($con, $val['name']);
  $date = mysqli_real_escape_string($con, $val['date']);

  $query = "INSERT INTO events.event (event.event_name, event.event_date) VALUES ('$name', '$date');";
  mysqli_query($con, $query);
}

function display_event($results)
{
  print"<table class='table'>";
  print"<thead> <tr>";
  print"<th>Name</th>";
  print"<th>Date</th>";
  print "<th></th>";
  print"</tr> </thead>";

  while($row = mysqli_fetch_array($results))
  {
    print "<tr>";
    print "<td>" . $row[1] . "</td>";
    print "<td>" . $row[2] . "</td>";
    print "<td><a class='btn btn-xs pull-right btn-danger' href='?del=" . $row[0] . "'><span class='glyphicon glyphicon-remove
    '></span></a><a class='btn btn-xs pull-right' href='?edit=" . $row[0] . "'><span class='glyphicon glyphicon-pencil
'></span></a></td>";
    print "</tr>";
  }
  print"</table>";
}

function delete_event($con, $event_id)
{
  $id = mysqli_real_escape_string($con, $event_id);

  $query = "DELETE FROM events.event WHERE event.event_id = $id";
  $results = mysqli_query($con, $query);

  return $results;
}

function edit_event($con, $event_data)
{
  $event_name = mysqli_real_escape_string($con, $event_data['event_name']);
  $event_date = mysqli_real_escape_string($con, $event_data['event_date']);
  $event_id = mysqli_real_escape_string($con, $event_data['event_id']);

  $query = "UPDATE events.event SET event.event_name = '$event_name', event.event_date = '$event_date' WHERE event.event_id = $event_id;";

  $results = mysqli_query($con, $query);

  return $results;
}

function get_event_data($con, $event_id)
{
  $id = mysqli_real_escape_string($con, $event_id);

  $query = "SELECT * FROM events.event WHERE event.event_id = $id";
  $results = mysqli_query($con, $query);

  $results = mysqli_fetch_array($results);

  return $results;
}

?>
