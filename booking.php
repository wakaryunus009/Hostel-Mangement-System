<?php
session_start();
print_r($_SESSION);
include('admin/functions.php');
include('admin/db.php');
// Retrieve data from POST request
$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$email = $_POST['email'];
$room_no = $_POST['room_no'];
$number_of_stu = $_POST['number_of_stu'];

// Prepare SQL statement to insert data into MySQL
echo $sql = "INSERT INTO booking (student_id, student_name, email, room_no, number_of_stu)
        VALUES ('$student_id', '$student_name', '$email', '$room_no', '$number_of_stu')";

// Execute SQL statement
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

?>
