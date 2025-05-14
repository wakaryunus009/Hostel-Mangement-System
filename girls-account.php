<?php
session_start();
// print_r($_SESSION);
include('auth.php');
include('admin/functions.php');
include('admin/db.php'); // Include the file containing database configuration
include("header.php");
// $obj = new Operations();

if (!isset($_SESSION['user_id'])) {
    header('Location: https://www.topranks.co/hms/');
    exit();
}

// Check if user is authorized to access boy section
$user_id = $_SESSION['user_id'];
$sql = "SELECT gender FROM student WHERE id = $user_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['gender'] !== 'female') {
    header('Location: index.html');
    exit();
}
$sel="SELECT * FROM student WHERE id='".$_SESSION['user_id']."'";
$qry=mysqli_query($db,$sel);
$rs=mysqli_fetch_array($qry);

// Boy section HTML

?>

<?php
error_reporting(E_ERROR);

$sql = "SELECT * FROM booking WHERE email = '".$_SESSION['email']."'";
$result = $db->query($sql);

if ($result->num_rows >= 1) {
    // Email already exists
    $msgs= "Already Booked This Email Id";
} else {
    if($_POST){
  $student_id=$_POST['student_id'];
  $student_name=$_POST['student_name'];
  $email=$_POST['email'];
  $room_no=$_POST['room_no'];
  $room_id=$_POST['room_id'];
  $number_of_stu=$_POST['number_of_stu'];
  
  $ins="INSERT INTO booking(
        `student_id`,
        `student_name`,
        `email`,
        `room_no`,
        `room_id`,
        `number_of_stu`
        )VALUES(
        '$student_id',
        '$student_name',
        '$email',
        '$room_no',
        '$room_id',
        '$number_of_stu'
      )";

        $qry=mysqli_query($db,$ins);
       if($qry){
        
   $sele = "SELECT * FROM room WHERE id = '$room_id'";
    $qry = mysqli_query($db,$sele);
    $rows=mysqli_fetch_array($qry);
    
  //  print_r($rows);
  if($rows){
      //$cat_id=$_POST['cat_id'];
      
      $rooms_nums = $rows['student_num'];
      
       $upd="UPDATE room SET student_num='".($rooms_nums-1)."' WHERE id = '$room_id'";
      $qry = mysqli_query($db,$upd);
  }
//   $sell="SELECT * FROM room WHERE id";
//     $qury=mysqli_query($db,$sell);
//     $rs=mysqli_fetch_array($qury);
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin/assets/css/app.min.css">
  <link rel="stylesheet" href="admin/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="stylesheet" href="admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='admin/assets/img/favicon.ico' />
  
</head>

<body>
  <!--<div class="loader"></div>-->
  <!--<div class="main-content">-->
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-3">
                    <?php include("sidebar.php");?>
                </div>
                <div class="col-9">
                    <div class="card" style="top:15%;">
                        <div class="card-header">
                            <div class="col-md-12">
                                <h2 style='text-align:center;' class='mt-4 mb-4'>Welcome to Girls Section</h2>
                                <h2 style="text-align: center;">List Of Rooms</h2>
                            </div>
                            <!--<div class="col-md-6">-->
                            <!--        <div class="sahid" style="margin-left: 60%; cursor: pointer;">-->
                            <!--            <span><?php echo "Hello, ".$_SESSION['email'];?></span>-->
                            <!--            <a href="logout.php"><i class="fa fa-user" aria-hidden="true"></i></a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                        </div>
                        <p style="text-align: center;">
                           <?php echo $msgs;?>
                            
                            </p>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#ID</th>
                                            <th>Department [Girls]</th>
                                            <th>Room Number</th>
                                            <th>Number of Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        

                                        // Fetch data from the 'page' table
                                        $sql = "SELECT * FROM `room` WHERE department='female'";
                                        $result = $db->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($rss = $result->fetch_assoc()) {
                                        ?>
                                                <tr class="text-center">
                                                    <td>#<?php echo $rss['id']; ?></td>
                                                    <td><?php echo $rss['department']; ?></td>
                                                    <td><?php echo $rss['room_no']; ?></td>
                                                    
                                                    <td><?php echo $rss['student_num']; ?></td>
                                                   
                                                    <td>
                                                        
                                            <form id="myForm" method="post">
                                                <input type="hidden" name="student_id" id="student_id" value="<?php echo $rs['id'];?>">
                                                <input type="hidden" name="student_name" id="name" value="<?php echo $rs['f_name'];?> <?php echo $rs['l_name'];?>">
                                                <input type="hidden" name="email" id="email" value="<?php echo $rs['email'];?>">
                                                <input type="hidden" name="room_no" id="room_no" value="<?php echo $rss['room_no']; ?>">
                                                <input type="hidden" name="room_id" id="room_id" value="<?php echo $rss['id']; ?>">
                                                <input type="hidden" name="number_of_stu" id="num_of_stu" value="1">
                                                <button class="btn btn-success" type="submit">Book Now</button>

                                                        
                                                        <!--<a href="#" class="btn btn-primary" onclick="submitForm()">Book Room</a>-->
                                                       </form>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 







                                                <script>
                                                     $('#del-page_<?php echo $rss['id']; ?>').click(function(){

                                                        var r = confirm("Are You Sure You Want To Delete!");
                                                
                                                          if (r == true) {
                                                
                                                            window.location = "del-student.php?id=<?php echo $rss['id']; ?>";
                                                          } else {
                                                
                                                          }
                                                    });

                                                </script>
                                        <?php 
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                        $db->close(); // Close the database connection
                                        ?>
                                    </tbody>
                                </table>
                                
                                
                                
                         <script>
//                                     function submitForm() {
//                                         // Serialize form data including the hidden inputs
// <!--                                        var formData = $('#myForm').serialize();
                                    
//                                         // Send the serialized data to a PHP script using AJAX
//                                         $.ajax({
//                                             type: 'POST',
//                                             url: 'booking.php',
//                                             data: formData,
//                                             success: function(response){
//                                                 // alert(response); // Show response from PHP script
//                                             }
//                                         });
//                                     }
// </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--</div>-->
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
</html>