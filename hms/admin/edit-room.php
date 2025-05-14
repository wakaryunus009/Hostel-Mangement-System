<?php
include('functions.php');
$obj = new Operations();

$w = "where id='".$_GET['id']."'";
$rs =$obj->getSingle('room',$w);

if($_POST){

$data = array(

//Pages Information

'department'=>$_POST['department'],
'room_no'=>$_POST['room_no'],
'student_num'=>$_POST['student_num']

);

$sql=$obj->update('room',$data,$rs['id']);
if($sql)
{
$message = '<div class="alert alert-success" id="insert_msg"><h1 style="text-align:center;">Data Updated Successfully</h1></div>';
}
  header('location:view-room.php');
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
                      <h4>UPDATE ROOMS</h4>
                    </div>
                     <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="insert_msg"><?php echo $message; ?></div>
                     
                        <div class="alert alert-success" style="text-align:center;font-size:25px;display:none;" id="update_msg">Data Updated Succesfully</div>
                    <div class="card-body">
                        
                    <div class="form-group">
                        <label>DEPARTMENT *</label>
                        <select name="department" class="form-control">
                            <option value="">--select--</option>
                            <option value="male" <?php if($rs['department'] == "male"){ echo "selected"; } ?>>male</option>
                            <option value="female" <?php if($rs['department'] == "female"){ echo "selected"; } ?>>female</option>
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label>ROOM NUMBER *</label>
                        <input type="text" class="form-control" name="room_no" id="room_no" value="<?php echo $rs['room_no'];?>" placeholder="Please Enter First Name" required="">
                      </div>
                      
                    <div class="form-group">
                        <label>NUMBER OF STUDENT *</label>
                        <input type="text" class="form-control" name="student_num" id="student_num" value="<?php echo $rs['student_num'];?>" placeholder="Please Enter First Name" required="">
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
            url: 'update_room.php', // PHP file to handle update
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