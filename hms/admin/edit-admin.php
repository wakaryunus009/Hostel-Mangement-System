<?php
include('functions.php');
// include('header.php');
?>

<?php require_once 'sidebar.php'?>

<?php

if($_POST){
//   print_r($_FILES);
  $full_name=$_POST['full_name'];
  $user_id=$_POST['user_id'];
  $password=$_POST['password'];
  $eiin=$_POST['eiin'];
  $position=$_POST['position'];
  $email_id=$_POST['email_id'];
  $contact_no=$_POST['contact_no'];
  $image=$_FILES['image']['name'];

   if($image==''){
        $image= $_POST['cat_old_image'];
}
        else{
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$image);
       }

    $upd="UPDATE admin_portal SET
    full_name='$full_name',
    user_id='$user_id',
    password='$password',
    eiin='$eiin',
    position='$position',
    email_id='$email_id',
    contact_no='$contact_no',
    image='$image'
    WHERE id='".$_GET['id']."'";
        $query=mysqli_query($db,$upd);
        // header("location:view-products.php");
    
}
    $sell="SELECT * FROM admin_portal WHERE id='".$_GET['id']."'";
    $qury=mysqli_query($db,$sell);
    $rs=mysqli_fetch_array($qury);
    
?>

  <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <form method="POST" id="myForm" enctype="multipart/form-data" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="full_name">FullName</label>
                    <input id="full_name" type="text" class="form-control" name="full_name" value="<?php echo $rs['full_name'];?>" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="name_msg">
                      Please fill in your FullName
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="user_id">Userid</label>
                    <input id="user_id" type="text" class="form-control" name="user_id" value="<?php echo $rs['user_id'];?>" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="userid_msg">
                      Please fill in your Userid
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" value="<?php echo $rs['password'];?>" tabindex="2" required>
                    <div class="invalid-feedback" id="password_msg">
                      please fill in your password
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="eiin">EIIN(Educations Institude Identifications Numbers)</label>
                    <input id="eiin" type="text" class="form-control" name="eiin" value="<?php echo $rs['eiin'];?>" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="eiin_msg">
                      Please fill in your EIIN
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="position">Positions (Incharge Nunber)</label>
                    <input id="position" type="text" class="form-control" name="position" value="<?php echo $rs['position'];?>" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="position_msg">
                      Please fill in your Incharge Number
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="email">EmailId</label>
                    <input id="email_id" type="email_id" class="form-control" name="email_id" value="<?php echo $rs['email_id'];?>"  tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="email_msg">
                      Please fill in your Username
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input id="contact_no" type="number" class="form-control" name="contact_no" value="<?php echo $rs['contact_no'];?>" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="number_msg">
                      Please fill in your Contact Number
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file" class="form-control" name="image" value="<?php echo $rs['cat_old_image'];?>
                    tabindex="1" required autofocus>
                    <td><img src="./images/<?php echo $rs['image']?>" height="50"></td>
                    <div class="invalid-feedback" id="image_msg">
                      Please fill in your Image
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="button" class="btn btn-primary btn-lg btn-block" tabindex="4" id="log_btn">
                      Update
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>

  <!-- General JS Scripts -->
  <?php require_once 'footer.php' ?>