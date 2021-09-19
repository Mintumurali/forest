<?php
include_once("../dbconnect.php");
$pname=$_POST['packname'];
$uname=$_POST['uname'];
$uid=$_POST['uid'];
$email=$_POST['email'];
$amt=$_POST['amt'];
$tdate=$_POST['tdate'];

$qry="INSERT INTO `orderdetails`
                (`orderid`, `name`, `email`, `packagename`, `amountduea`, `traveldate`, `purchasedate`)
         VALUES ('','$uname','$email','$pname','$amt','$tdate',now()    )";

mysql_query($qry);
header("location:index.php");
?>