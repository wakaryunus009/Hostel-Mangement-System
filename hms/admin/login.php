<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4 style="text-align:center;">Login</h4>
                
              </div>
              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                    
                     <div class="form-group">
                    <label for="eiin">EIIN(Educations Institude Identifications Numbers)</label>
                    <input id="eiin" type="text" class="form-control" name="eiin" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="eiin_msg">
                      Please fill in your EIIN
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="user_id">Username</label>
                    <input id="user_id" type="text" class="form-control" name="user_id" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="user_msg">
                      Please fill in your User ID
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback" id="pass_msg">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="log_btn">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	    $('#log_btn').click(function(){
	        $('#log_btn').prop('disabled', true);
	       var eiin = $('#eiin').val();
	       var user_id = $('#user_id').val();
	       var password = $('#password').val();
	       var remember = $('#remember').val();
	       
	       if(eiin == ''){
	           $('#eiin_msg').slideDown();
	           $('#eiin_msg').delay(500).fadeOut();
	           $('#log_btn').prop('disabled', false);
	       }
	       else if(user_id == ''){
	           $('#user_msg').slideDown();
	           $('#user_msg').delay(500).fadeOut();
	           $('#log_btn').prop('disabled', false);
	       }else if(password == ''){
	           $('#pass_msg').slideDown();
	           $('#pass_msg').delay(500).fadeOut();
	           $('#log_btn').prop('disabled', false);
	       }else{
	           $.ajax({
	              url : 'admin_log_action.php',
	              type : 'post',
	              data : {
	                  eiin : eiin,
	                  user_id : user_id,
	                  password : password,
	                  remember: remember,
	              },
	              success:function(data){
	                  if(data == 'success'){
	                   //   alert(data);
	                      $('#suc_msg').slideDown();
	                      $('#suc_msg').delay(1500).fadeOut();
	                      $('#log_btn').prop('disabled', false);
	                      window.location = 'https://topranks.co/hms/admin/index.php';
	                  }else{
	                      $('#er_msg').slideDown();
	                      $('#er_msg').delay(1500).fadeOut();
	                      $('#log_btn').prop('disabled', false);
	                  }
	              }
	           });
	       }
	    });
	</script>
  </div>
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