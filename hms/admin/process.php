<?php
    include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $eiin = $_POST['eiin'];
    $position = $_POST['position'];
    $email_id = $_POST['email_id'];
    $contact_no = $_POST['contact_no'];
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    // Server-side validation
    if(empty($full_name) || empty($user_id) || empty($password) || empty($eiin) || empty($position) || empty($email_id) || empty($contact_no) || empty($image_name)) {
        http_response_code(400);
        echo "Error: All fields are required.";
        exit;
    }

    // Additional validation such as email format validation can be performed here

    // Handling image upload
    $target_dir = "images/";
    $target_file = $target_dir . basename($image_name);

    if (move_uploaded_file($image_tmp_name, $target_file)) {
        // Insert data into database
        echo $sql = "INSERT INTO admin_portal (full_name, user_id, password, eiin, position, email_id, contact_no, image) VALUES ('$full_name', '$user_id', '$password', '$eiin', '$position', '$email_id', '$contact_no', '$image_name')";

        if ($db->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Close database connection
    $conn->close();
}
?>
