<?php
session_start();
//print_r($_SESSION);
include('auth.php');
// include('admin/functions.php');
include('admin/db.php'); // Include the file containing database configuration
include("header.php");
// $obj = new Operations();

// if (!isset($_SESSION['user_id'])) {
//     header('Location: https://www.topranks.co/hms/');
//     exit();
// }

// // Check if user is authorized to access boy section
// $user_id = $_SESSION['user_id'];
// $sql = "SELECT gender FROM student WHERE id = $user_id";
// $result = mysqli_query($db, $sql);
// $row = mysqli_fetch_assoc($result);
// if ($row['gender'] !== 'female') {
//     header('Location: index.html');
//     exit();
// }
// $sel="SELECT * FROM student WHERE id='".$_SESSION['user_id']."'";
// $qry=mysqli_query($db,$sel);
// $rs=mysqli_fetch_array($qry);

// // Boy section HTML

// error_reporting(E_ERROR);

// $sql = "SELECT * FROM booking WHERE email = '".$_SESSION['email']."'";
// $result = $db->query($sql);

// if ($result->num_rows >= 1) {
//     // Email already exists
//     $msgs= "Already Booked This Email Id";
// } else {
    if($_POST){
      $stu_complain=$_POST['stu_complain'];
      $room_number=$_POST['room_number'];

  $ins="INSERT INTO complain (
        `stu_complain`,
        `room_number`,
        `department`
        ) VALUES (
        '$stu_complain',
        '$room_number',
        '{$_SESSION['email']}'
      )";

    mysqli_query($db,$ins);
    }
//       if($qry){
        
//   $sele = "SELECT * FROM room WHERE id = '$room_id'";
//     $qry = mysqli_query($db,$sele);
//     $rows=mysqli_fetch_array($qry);
    
//   //  print_r($rows);
//   if($rows){
//       //$cat_id=$_POST['cat_id'];
      
//       $rooms_nums = $rows['student_num'];
      
//       $upd="UPDATE room SET student_num='".($rooms_nums-1)."' WHERE id = '$room_id'";
//       $qry = mysqli_query($db,$upd);
//   }
// //   $sell="SELECT * FROM room WHERE id";
// //     $qury=mysqli_query($db,$sell);
// //     $rs=mysqli_fetch_array($qury);
//   }
// }
// }
?>

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
                                <h2 style="text-align: center;">What Is Your Complain</h2>
                            </div>
                        </div>
                        <p style="text-align: center;">
                           <?php echo $msgs;?>
                            
                            </p>
                        <div class="card">
                  <form method="post" id="myForm" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <!--<div class="card-header">-->
                    <!--  <h4>ADD ROOMS</h4>-->
                    <!--</div>-->
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg"><?php echo $message; ?></div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                    <div class="form-group">
                    
                    <div class="form-group">
                        <label>YOUR COM PLAIN *</label>
                        <textarea type="text" class="form-control" name="stu_complain" placeholder="Please Enter Your Complain" required=""></textarea>
                    </div>
                     <div class="form-group">
                        <label>ROOM NUMBER *</label>
                        <input type="text" class="form-control" name="room_number"placeholder="Please Enter Room Number" required="">
                    </div>
                     <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $_SESSION['email'];?>" name="department" placeholder="Please Enter Room Number" required="">
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="log_btn">Add Complain</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                  
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