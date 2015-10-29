<?php
function get_connection(){
  include 'config.php';

  $con = mysqli_connect(
    $DB['host'],
    $DB['user'],
    $DB['pass'],
    $DB['db']
  );

  if(!$con){
    die("Connection Error: " . mysqli_connect_error());
  }else

  return $con;
}

function query(){
  // Write query code
}

?>
