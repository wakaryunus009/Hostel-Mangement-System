<?php

include('functions.php');
$obj = new Operations();

 $where = "where id = '".$_GET['id']."'";
 $wh = $obj->getSingle('page', $where);

 if ($wh['status'] == 'Disabeld') {
 $data=array(
 'status'=>'Active');
 $obj->update("page",$data,$_GET['id']);

 	}else{
    $data=array(
    'status'=>'Disabeld');
 	$obj->update("page",$data,$_GET['id']);

 	}

header('location:view-page.php');

?>