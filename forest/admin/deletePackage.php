<?php


include_once("../dbconnect.php");
loginrequired('admin');

$id=$_GET['id'];
if($id){
    $sql="DELETE FROM `packageinfo` WHERE `packageid`='$id'";
    if(mysql_query($sql)){
        header("location:all_Packages.php");
    }
    else{
        echo "internal Error".mysql_error();
    }
}
else
 echo "wronng page .. Go back";




