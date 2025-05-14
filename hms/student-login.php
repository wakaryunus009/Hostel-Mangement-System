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
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4 style="text-align:center;">Students Login</h4>
                
              </div>
              <div class="card-body">
                <form method="POST" id="loginForm" class="needs-validation" novalidate="">
                    
                     <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="email_msg">
                      Please fill in your Email
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                    <div class="invalid-feedback" id="password_msg">
                      Please fill in your Password
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
    $(document).ready(function() {
        $('#loginForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission
            var formData = $(this).serialize();
            // alert(formData);
            $.ajax({
                type: 'POST',
                url: 'student_login_action.php',
                data: formData,
                success: function(response) {
                    // alert(response);
                    data=response.split('|');
                    // alert(data[1]);
                    if (data[0]=='success' && data[1]=='male') { // Trim response to remove any extra whitespace
                        window.location.href = 'https://topranks.co/hms/boys-account.php'; // Redirect for male
                    } else if (data[0]=='success' && data[1]=='female') { // Trim response to remove any extra whitespace
                        window.location.href = 'https://topranks.co/hms/girls-account.php'; // Redirect for male
                    } 
                    
                    else {
                        $('#error').html('Invalid username or password');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log any errors to console
                }
            });
        });
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