<?php
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
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
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
                        if(isset($_SESSION['user_id'])) {
                            $where_user = "where user_id = '".$_SESSION['user_id']."'";
    
                            $user = $obj->getSingle('admin_portal',$where_user);
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
                        echo "Welcome, ".$user['full_name']."!"; 
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
            } else {
                echo "You are not logged in!";
            }
         ?>
      </nav>
      </div>
      </div>