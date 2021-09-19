<?php


include_once("../dbconnect.php");
loginrequired('admin');

$id=$_GET['id'];
if($id){
    $sql="update packages set Active=1 where AutoId='$id'";
    if(mysql_query($sql)){
        header("location:all_Packages.php");
    }
    else{
        echo "internal Error".mysql_error();
    }
}
else
 echo "wronng page .. Go back";




