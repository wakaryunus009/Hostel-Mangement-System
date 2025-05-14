<?php
session_start();
include('functions.php');
$obj = new Operations();

if($_POST){
    $eiin = $_POST['eiin'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    
        $data = array(
        'eiin'=>$eiin,
        'user_id'=>$user_id,
        'password'=>$password
        );
        // $sql = "SELECT * FROM admin_portal WHERE eiin = '3' AND user_id = 'ansari' AND password = '1'";

        $where_user = " where eiin = '".$eiin."' AND user_id = '".$user_id."' AND password =  '".$password."'";
    
        $user = $obj->getSingle('admin_portal',$where_user);
        
        //print_r($user);
        //die();
        if($user){
        
              $_SESSION['userID'] = $user['id'];
              $_SESSION['user_id'] = $user_id;
              $_SESSION['admin_permission'] = 'admin';
              
              
              if($_POST['remember']=='yes'){
              
                  setcookie("userID",$user['id'],time()+ (10 * 10 * 24 * 60 * 60));
                   setcookie("admin_permission",'admin',time()+ (10 * 10 * 24 * 60 * 60));
              }
        
              echo "success";
        }
}

?>