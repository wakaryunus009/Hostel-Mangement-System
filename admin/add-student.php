<?php
include('functions.php');
$obj = new Operations();


include 'header.php'?>

<?php require_once 'sidebar.php'?>
 <!--== SIDEBAR ENDS ==-->
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      
<script>
$(document).ready(function(){
        $('#log_btn').click(function(){
            var formData = new FormData($('#myForm')[0]);

            
            $.ajax({
                url: 'student-create.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#result').html(response);
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
           window.location = 'view-page.php';
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
                      <h4>ADD STUDENT</h4>
                    </div>
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg"><?php echo $message; ?></div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                    <div class="form-group">
                        <label>GENDER *</label>
                        <select name="gender" class="form-control" required="">
                                <option value="">Please Select Gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                        </select>
                        </div>
                    
                    <div class="form-group">
                        <label>FIRST NAME *</label>
                        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Please Enter First Name" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>LAST NAME *</label>
                        <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Please Enter First Name" required="">
                      </div>
                    
                    <div class="form-group">
                        <label>EMAIL *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Please Enter Email Id" required="">
                    </div>
                      
                    <div class="form-group">
                        <label>PASSWORD *</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Please Enter Password" required="">
                     </div>
                    
                    <div class="form-group">
                        <label>Mobile Number *</label>
                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Please Enter Mobile Number" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>ADDRESS *</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address" required=""></textarea>
                     </div>
                    
                    <div class="form-group">
                        <label>COURSE NAME *</label>
                        <input type="text" class="form-control" name="class" id="class"  placeholder="Your Class" required="">
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="log_btn">Submit</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                  
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
      </div>
<?php require_once 'footer.php' ?>