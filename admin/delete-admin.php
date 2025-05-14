<?php
include('functions.php');


$id= $_GET['id'];
$del="delete from admin_portal where id='$id'";
mysqli_query($db,$del);
header('location:view-admin.php');

?>
