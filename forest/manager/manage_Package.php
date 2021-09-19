<?php
include_once('../dbconnect.php');
loginrequired('manager');
date_default_timezone_set('Asia/Kolkata');
$uid=$_SESSION['uid'];
include_once("assets/inc/head.php");
?>
 <div class="jumbotron">
        <h1>WELCOME</h1>
</div>
    <table class="table">
     <thead>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Details</th>
        <th>Price</th>
        <th>Status</th>
        <th>Option</th>
     </thead>
     <tbody>
        <?php

        $qry="SELECT * FROM `packageinfo` WHERE ManagerId=$uid";
        //echo($qry);
        $res=mysql_query($qry);
        $i=0;
        while($row=mysql_fetch_assoc($res)){
            ?>
        <tr>
        <td><?php echo(++$i); ?></td>
        <td><?php echo($row['packagename']) ?></td>
        <td><?php 
                 $string=substr($row['packagedetails'],0,30);
                 echo($string."..."); ?>
        </td>
        <td><?php echo($row['price']) ?></td>
        <td><?php echo($row['packagetype']) ?></td>
       
        <td>
        <a href="deletePackage.php?id=<?php echo $row['packageid'];?>" class="btn btn-fill">Delete Package</a>
        </td>
        </tr>
        <?php
        }
        ?>
     </tbody>
    </table>
    <?php
include_once("assets/inc/foot.php");
?>