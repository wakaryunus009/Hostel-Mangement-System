
<?php
$hostname = "localhost:3306";
$username = "acepraz4_hms";
$password = "[KMS;q.m6e.5";
$dbname = "acepraz4_hms";

// Create connection
$db = new mysqli($hostname, $username, $password,$dbname);

// Check connection
if ($db ->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
// echo "Connected successfully";


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // print_r($_POST);
    $email = $_POST['email'];

    // Check if email exists in database
    // Replace this with your database query to check if email exists
    // Example: $sql = "SELECT * FROM users WHERE email='$email'";
    // Example: $result = mysqli_query($conn, $sql);
    // Example: $row = mysqli_fetch_assoc($result);
    // Example: $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Email exists, generate random password
        $new_password = generateRandomPassword();

        // Update password in database
        // Replace this with your database query to update password
        // Example: $update_sql = "UPDATE users SET password='$new_password' WHERE email='$email'";
        // Example: mysqli_query($conn, $update_sql);

        // Send new password to user's email
        // Replace this with your email sending code
        // Example: mail($email, 'Password Reset', 'Your new password is: '.$new_password);

        // Return success message
        echo 'success';
    } else {
        // Email does not exist
        echo 'not_found';
    }
}

// Function to generate random password
function generateRandomPassword() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $length = 8;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>