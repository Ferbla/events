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
    print "<td>" . $row[0] . "</td>";
    print "<td>" . $row[1] . "</td>";
    print "<td><button class='btn btn-xs pull-right btn-danger'><span class='glyphicon glyphicon-remove
    '></span></button><button class='btn btn-xs pull-right'><span class='glyphicon glyphicon-pencil
'></span></button></td>";
    print "</tr>";
  }
  print"</table>";
}

?>
