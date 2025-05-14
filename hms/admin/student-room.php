<?php
    include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST['department'];
    $room_no = $_POST['room_no'];
    $student_num = $_POST['student_num'];

    // Server-side validation
    if(empty($department) || empty($room_no) || empty($student_num)) {
        http_response_code(400);
        echo "Error: All fields are required.";
        exit;
    }

    // Additional validation such as email format validation can be performed here

    // Handling image upload
    // $target_dir = "images/";
    // $target_file = $target_dir . basename($image_name);

    // if (move_uploaded_file($image_tmp_name, $target_file)) {
        // Insert data into database
        echo $sql = "INSERT INTO room (department, room_no, student_num ) VALUES ('$department', '$room_no', '$student_num')";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    } 
    // else {
    //     echo "Sorry, there was an error uploading your file.";
    // }

    // Close database connection
    $conn->close();

?>