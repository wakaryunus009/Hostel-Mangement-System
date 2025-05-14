<?php

include('functions.php');

$obj = new Operations();

$obj->delete('student', $_GET['id']); // Change 'page' to 'student'

header('location:view-student.php'); // Assuming 'view-page.php' is the correct redirect page
?>
