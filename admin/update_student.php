<?php
include('functions.php');
$obj = new Operations();

// Check if form data is submitted
if(isset($_POST['id']) && isset($_POST['gender'])) {
    $data = array(
        'gender' => $_POST['gender'],
        'f_name' => $_POST['f_name'],
        'l_name' => $_POST['l_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'mobile' => $_POST['mobile'],
        'address' => $_POST['address'],
        'class' => $_POST['class'],
        // Add more fields to update
    );

    // Update student information
    $result = $obj->update('student', $data, $_POST['id']);
    if($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
