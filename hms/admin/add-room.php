<?php
include('functions.php');
$obj = new Operations();

// if($_GET['mode'] == 'edit'){
//     $w = "where id = '".$_GET['id']."'";
//     $rs = $obj->getSingle('page',$w);
// }


// if($_POST){

// $data = array(

// // page Information

// 'page_name'=>$_POST['page_name'],
// 'description'=>$_POST['description'],
// 'orders'=>$_POST['orders'],
// 'content'=>$_POST['content'],
// 'status'=>$_POST['status']
	
// );

//   if($_GET['mode'] != 'edit'){
//     $obj->insert('page',$data);
//     header('location:add-page.php?mode=success');
//     }else{
//     $obj->update('page',$data,$rs['id']);
//     header('location:add-page.php?mode=update');  
//     }
// }


include 'header.php'?>

<?php require_once 'sidebar.php'?>
 <!--== SIDEBAR ENDS ==-->
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
<script>
$(document).ready(function(){
        $('#log_btn').click(function(){
            var formData = new FormData($('#myForm')[0]);

            
            $.ajax({
                url: 'student-room.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#result').html(response);
                    alert()
                },
                error: function(xhr, status, error) {
                    $('#result').html("An error occurred: " + error);
                }
            });
        });
    });
    
    
    $(document).ready(function(){
       var mode = '<?php echo $_GET['mode']; ?>';
       if(mode == 'success'){
           $('#insert_msg').slideDown();
           $('#insert_msg').delay(1500).fadeOut();
       }
       if(mode == 'update'){
           $('#update_msg').slideDown();
           $('#update_msg').delay(1500).fadeOut();
        //   window.location = 'view-page.php';
       }
    });
</script>

// <?php
//         error_reporting(E_ERROR);
//         include('db.php');
//         if($_POST){
//           $gender=$_POST['gender'];
//           $f_name=$_POST['f_name'];
//           $l_name=$_POST['l_name'];
//           $email=$_POST['email'];
//           $password=$_POST['password'];
//           $mobile=$_POST['mobile'];
//           $address=$_POST['address'];
//           $class=$_POST['class'];
  
  
//         echo $ins="INSERT INTO student(
//                     gender,
//                     f_name,
//                     l_name,
//                     email,
//                     password,
//                     mobile,
//                     address,
//                     class
//                     )VALUES(
//                     '$gender',
//                     '$f_name',
//                     '$l_name',
//                     '$email',
//                     '$password',
//                     '$mobile',
//                     '$address',
//                     '$class'
//                     )";

//             $qry=mysqli_query($db,$ins);
            
//             if ($qry) {
//                 $message = "Data Inserted Succesfully";
//                 } else {
//                 $message = "Error: " . mysqli_error($db);
// }
// }

// ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <form method="post" id="myForm" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>ADD ROOMS</h4>
                    </div>
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg"><?php echo $message; ?></div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                    <div class="form-group">
                        <label>DEPARTMENT *</label>
                        <select name="department" class="form-control" required="">
                                <option value="">Please Select Department</option>
                                <option value="female">Girl</option>
                                <option value="male">Boys</option>
                        </select>
                        </div>
                    
                    <div class="form-group">
                        <label>ROOM NUMBER *</label>
                        <input type="text" class="form-control" name="room_no" id="room_no" placeholder="Please Enter Room Number" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>NUMBER OF STUDENT *</label>
                        <input type="text" class="form-control" name="student_num" id="student_num" placeholder="Please Enter Student Number" required="">
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="log_btn">Add Rooms</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                  
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
      </div>
<?php require_once 'footer.php' ?>