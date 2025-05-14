<?php

session_start();
$admin_permission = $_COOKIE['admin_permission'];
if($_SESSION['admin_permission'] != 'admin' && $admin_permission!='admin'){
	header('location:login.php');
}

?>