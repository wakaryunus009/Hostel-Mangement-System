<?php
session_start();
if($_SESSION['email']==''){
 header('Location:student-login.php');
}
?>