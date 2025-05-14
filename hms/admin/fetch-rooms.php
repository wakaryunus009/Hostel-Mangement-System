<?php
// Include database connection script
include('db.php');

// Check if department is set in the POST request
if(isset($_POST['department'])) {
    $department = $_POST['department'];
    
    // Fetch rooms based on department
    $sql = "SELECT * FROM room WHERE department = '$department'";
    $result = $db->query($sql);
    
    $room = array();
    
    // If there are rows returned
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Append each row to the $rooms array
            $room[] = $row;
        }
    }
    
    // Encode $rooms array as JSON and echo it
    echo json_encode($room);
}

// Close database connection
$db->close();
?>
