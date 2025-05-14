<?php
include('functions.php');


$id= $_GET['id'];
$del="delete from booking where id='$id'";
mysqli_query($db,$del);
header('location:view-booking.php');

?>
