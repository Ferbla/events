<?php
function add_event($con, $val)
{
  /*foreach($options as &$val)
  {
    $val = mysqli_real_escape_string($con, $val);
  }*/

  $name = mysqli_real_escape_string($con, $val['name']);
  $date = mysqli_real_escape_string($con, $val['date']);

  $query = "INSERT INTO events.event (event.event_name, event.event_date) VALUES ('$name', '$date');";
  mysqli_query($con, $query);

}

function display_event($results)
{
  print"<table>";
  while($row = mysqli_fetch_array($results))
  {
    print "<tr>";
    print "<td>" . $row[0] . "</td>";
    print "<td>" . $row[1] . "</td>";
    /*print "<td>" . $row[2] . "</td>";*/
    print "</tr>";
  }
  print"</table>";
}

?>
