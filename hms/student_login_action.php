<?php
session_start();
include('admin/functions.php');
include('admin/db.php');
$obj = new Operations();
// print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // print_r($_POST);
$email = urldecode($_POST['email']);
$password = trim($_POST['password']);

    
    // Validate username and password
    $sql = "SELECT * FROM student WHERE email = :email AND password = :password";
    $stmt = $db->prepare($sql);
    $stmt->execute(array(':email' => $email, ':password' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if ($row) {
        $gender = $row['gender']; // Get user's gender
        if ($gender == 'male') {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['email'] = $row['email'];
            
            echo 'success|male'; // Return success for boys
        } elseif ($gender == 'female') {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['email'] = $row['email'];
            echo 'success|female';
        } else {
            echo 'unknown'; // Handle other cases if needed
        }
    } else {
        echo 'invalid'; // Return invalid if credentials are incorrect
    }
}
?>
