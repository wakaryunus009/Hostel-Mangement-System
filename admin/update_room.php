<?php
include('functions.php');
$obj = new Operations();

// Check if form data is submitted
if(isset($_POST['id']) && isset($_POST['gender'])) {
    $data = array(
        'department' => $_POST['department'],
        'room_no' => $_POST['room_no'],
        'student_num' => $_POST['student_num'],
        // Add more fields to update
    );

    // Update student information
    $result = $obj->update('room', $data, $_POST['id']);
    if($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
