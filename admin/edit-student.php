<?php
include('functions.php');
$obj = new Operations();

$w = "where id='".$_GET['id']."'";
$rs =$obj->getSingle('student',$w);

if($_POST){

$data = array(

//Pages Information

'gender'=>$_POST['gender'],
'f_name'=>$_POST['f_name'],
'l_name'=>$_POST['l_name'],
'email'=>$_POST['email'],
'password'=>$_POST['password'],
'mobile'=>$_POST['mobile'],
'address'=>$_POST['address'],
'class'=>$_POST['class']

);

$sql=$obj->update('student',$data,$rs['id']);
if($sql)
{
$message = '<div class="alert alert-success" id="insert_msg"><h1 style="text-align:center;">Data Updated Successfully</h1></div>';
}
  header('location:view-student.php');
?>

<?php 
}
include 'header.php'?>

<?php require_once 'sidebar.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
document.write('<?php echo $message; ?>');
$('#insert_msg').delay(2000).fadeOut();
</script>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <form method="post" id="myForm" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>UPDATE STUDENT</h4>
                    </div>
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg"><?php echo $message; ?></div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                    <div class="form-group">
                        <label>GENDER *</label>
                        <select name="gender" class="form-control">
                            <option value="">--select--</option>
                            <option value="male" <?php if($rs['gender'] == "male"){ echo "selected"; } ?>>male</option>
                            <option value="female" <?php if($rs['gender'] == "female"){ echo "selected"; } ?>>female</option>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label>FIRST NAME *</label>
                        <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $rs['f_name'];?>" placeholder="Please Enter First Name" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>LAST NAME *</label>
                        <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $rs['l_name'];?>" placeholder="Please Enter First Name" required="">
                      </div>
                    
                    <div class="form-group">
                        <label>EMAIL *</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo $rs['email'];?>" placeholder="Please Enter Email Id" required="">
                    </div>
                      
                    <div class="form-group">
                        <label>PASSWORD *</label>
                        <input type="password" class="form-control" name="password" id="password" value="<?php echo $rs['password'];?>" placeholder="Please Enter Password" required="">
                     </div>
                    
                    <div class="form-group">
                        <label>Mobile Number *</label>
                        <input type="number" class="form-control" name="mobile" id="mobile" value="<?php echo $rs['mobile'];?>" placeholder="Please Enter Mobile Number" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>ADDRESS *</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address" required=""><?php echo $rs['address'];?></textarea>
                    </div>

                    
                    <div class="form-group">
                        <label>CLASS *</label>
                        <input type="text" class="form-control" name="class" id="class" value="<?php echo $rs['class'];?>" placeholder="Your Class" required="">
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" id="log_btn">Update</button>
                    </div><?php include('footer.php'); ?>
                  </form>
                  
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <script>
$(document).ready(function(){
    $('#myform').submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'update_student.php', // PHP file to handle update
            data: $(this).serialize(),
            success: function(response){
                if(response == 'success') {
                    // Show success message or redirect to another page
                    alert('Student information updated successfully!');
                } else {
                    // Show error message or handle the error
                    alert('Error updating student information.');
                }
            },
            error: function(xhr, status, error){
                console.error(xhr.responseText);
                // Show error message or handle the error
                alert('Error updating student information.');
            }
        });
    });
});
</script>

<?php require_once 'footer.php' ?>