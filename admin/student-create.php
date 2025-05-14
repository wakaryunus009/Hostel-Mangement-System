<?php
    include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = $_POST['gender'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $class = $_POST['class'];

    // Server-side validation
    if(empty($gender) || empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($mobile) || empty($address) || empty($class)) {
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
        echo $sql = "INSERT INTO student (gender, f_name, l_name, email, password, mobile, address, class) VALUES ('$gender', '$f_name', '$l_name', '$email', '$password', '$mobile', '$address', '$class')";

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