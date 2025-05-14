<?php
// print_r($_SESSION);
include('auth.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin-Invoice</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="admin/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="admin/assets/css/style.css">
  <link rel="stylesheet" href="admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="admin/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='admin/assets/img/favicon.ico' />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</head>

<body>
  <!--<div class="loader"></div>-->
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky" style=
      "background: white;">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg 
            collapse-btn"> <i data-feather="align-justify"></i></a></li>
           
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <?php
                        // Check if admin is logged in
                        // if(isset($_SESSION['user_id'])) {
                        //     $where_user = "where user_id = '".$_SESSION['user_id']."'";
    
                        //     $user = $obj->getSingle('admin_portal',$where_user);
                            // print_r($user);
                            
                      ?>
        <ul class="navbar-nav navbar-right">
            
          <li class="dropdown">
              <a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="https://topranks.co/hms/admin/images/<?php echo $user['image'];?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">
                    <?php 
                        echo "Welcome, ".$_SESSION['email']."!"; 
                    ?>
                </div>
            <a href="upd_pass.php" class="dropdown-item has-icon"> <i class="fa fa-gear fa-fw"></i>
                Change Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        
        </ul>
         <?php
            // } else {
            //     echo "You are not logged in!";
            // }
         ?>
      </nav>
      </div>
      </div>