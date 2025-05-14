<?php

session_start();

include('functions.php');
$obj = new Operations();


//print_r($_SESSION);

$where = "where username = '".$_SESSION['admin_permission']."'";

$rs = $obj->getSingle('admin_login',$where);



if($rs['password'] != $_POST['cur_pass']){

    echo "error";

}

else if($rs['password'] == $_POST['new_pass']){

    echo "same_pass";

}

else{

    $data = array(

            'password' => $_POST['new_pass']

        );

    $obj->update('admin_login',$data,$rs['id']);

    echo "success";

}



?>