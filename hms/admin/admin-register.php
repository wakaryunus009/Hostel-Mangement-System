<?php
include('functions.php');
$obj = new Operations();


include 'header.php'?>

<?php require_once 'sidebar.php'?>

  <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                <form method="POST" id="myForm" enctype="multipart/form-data" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="full_name">FullName</label>
                    <input id="full_name" type="text" class="form-control" name="full_name" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="name_msg">
                      Please fill in your FullName
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="user_id">Userid</label>
                    <input id="user_id" type="text" class="form-control" name="user_id" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="userid_msg">
                      Please fill in your Userid
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback" id="password_msg">
                      please fill in your password
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="eiin">EIIN(Educations Institude Identifications Numbers)</label>
                    <input id="eiin" type="text" class="form-control" name="eiin" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="eiin_msg">
                      Please fill in your EIIN
                    </div>
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="position">Positions (Incharge Nunber)</label>
                    <input id="position" type="text" class="form-control" name="position" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="position_msg">
                      Please fill in your Incharge Number
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="email">EmailId</label>
                    <input id="email_id" type="email_id" class="form-control" name="email_id" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="email_msg">
                      Please fill in your Username
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input id="contact_no" type="number" class="form-control" name="contact_no" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="number_msg">
                      Please fill in your Contact Number
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" type="file" class="form-control" name="image" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="image_msg">
                      Please fill in your Image
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="button" class="btn btn-primary btn-lg btn-block" tabindex="4" id="log_btn">
                      Register
                    </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
$(document).ready(function(){
        $('#log_btn').click(function(){
            var formData = new FormData($('#myForm')[0]);

            
            $.ajax({
                url: 'process.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#result').html(response);
                    window.location.href = 'https://topranks.co/admin/admin-register.php';
                },
                error: function(xhr, status, error) {
                    $('#result').html("An error occurred: " + error);
                }
            });
        });
    });
</script>

  <!-- General JS Scripts -->
  <?php require_once 'footer.php' ?>