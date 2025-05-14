<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin aur Student Ke Liye Form</title>
    <link rel="stylesheet" href="admin/assets/css/app.min.css">
      <link rel="stylesheet" href="admin/assets/bundles/bootstrap-social/bootstrap-social.css">
      <!-- Template CSS -->
      <link rel="stylesheet" href="admin/assets/css/style.css">
      <link rel="stylesheet" href="admin/assets/css/components.css">
      <!-- Custom style CSS -->
      <link rel="stylesheet" href="admin/assets/css/custom.css">
      <link rel='shortcut icon' type='image/x-icon' href='admin/assets/img/favicon.ico' />
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            background-image: url(./admin/images/background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .containers {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        .box {
            width: 330px;
            height: 330px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: #6777ef;
        }
        .box h2 {
            margin-top: 40%;
            text-align: center;
            font-size: 30px;
        }
        .box h2 a{
            text-decoration: none;
            color: white;
        }
        .heading{
            text-align: center; 
            color: black; 
            margin-top: 8%;
        }
        @media (min-width : 320px) and (max-width:924px){
           .heading{
                text-align: center; 
                color: black; 
                margin-top: 20%;
            }
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="left:0; top:0">
            <div class="container">
          <a class="navbar-brand" href="#"><img src="admin/images/University Logo.jpg" width="30%"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item active">
                <a class="nav-link" href="about.php">About Us <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about.php">Photo <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="news-feed.php">Review <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item active">
                <a class="nav-link" href="contact.php">Contact Us <span class="sr-only">(current)</span></a>
              </li>
               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                </div>
              </li>
               
            </ul>
          </div>
          </div>
        </nav>

<h1 class="heading">HOSTEL MANAGEMENT SYSTEM ALIAH UNIVERSITY </h1>

<div class="containers">
    <div class="box">
        <h2><a href="student-login.php"><img src="admin/images/5850276.png" height="50px">Student Portal</a></h2>
    </div>
    <div class="box">
        <h2><a href="https://topranks.co/hms/admin/login.php"><img src="admin/images/setting.png" height="50px">Admin Portal</a></h2>
    </div>
</div>


</body>
</html>
