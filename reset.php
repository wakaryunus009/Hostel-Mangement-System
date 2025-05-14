

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div id="forgot_password_form">
        <input type="email" id="email" placeholder="Enter your email">
        <button id="reset_password">Reset Password</button>
    </div>
    <div id="password_box" style="display: none;">
        <input type="password" id="new_password" placeholder="New Password">
        <input type="password" id="confirm_password" placeholder="Confirm Password">
        <button id="change_password">Change Password</button>
    </div>

    <script>
        $(document).ready(function() {
            $('#reset_password').click(function() {
                var email = $('#email').val();
                // alert(email);

                $.ajax({
                    type: 'POST',
                    url: 'forgot_password.php',
                    data: { email: email },
                    success: function(response) {
                        if (response == 'success') {
                            $('#forgot_password_form').hide();
                            $('#password_box').show();
                        } else if (response == 'not_found') {
                            alert('Email not found');
                        } else {
                            alert('Something went wrong');
                        }
                    }
                });
            });

            $('#change_password').click(function() {
                var new_password = $('#new_password').val();
                var confirm_password = $('#confirm_password').val();

                // Check if passwords match
                if (new_password != confirm_password) {
                    alert('Passwords do not match');
                    return;
                }

                // Perform your password change process here
                // Example: Use AJAX to send new password to server and update database

                // After successful password change
                alert('Password changed successfully');
            });
        });
    </script>
</body>
</html>
