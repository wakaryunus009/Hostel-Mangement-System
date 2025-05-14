<?php

include('functions.php');

$obj = new Operations();

$obj->delete('room', $_GET['id']); // Change 'page' to 'student'

header('location:view-room.php'); // Assuming 'view-page.php' is the correct redirect page
?>
