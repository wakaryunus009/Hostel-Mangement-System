<?php

include('functions.php');

$obj = new Operations();

 $where = "where id = '".$_GET['id']."'";
 $wh = $obj->getSingle('plans', $where);
 
 if ($wh['action'] == 'Active') {
     
 $data=array(
 'action'=>'Inactive');
 $obj->update("plans",$data,$_GET['id']);
 
	}else{
	    
    $data=array(
    'action'=>'Active');
 	$obj->update("plans",$data,$_GET['id']);

 	}
header('location:view-plans.php');

?>