<?php
include_once("../dbconnect.php");
loginrequired('admin');
include_once("assets/inc/head.php");
?>
<div class="jumbotron">
        <h1>All Bookings</h1>
    </div>
    <table class="table">
     <thead>
        <th>Sl No.</th>
        <th> Name</th>
        <th>Emaial</th>
        <th>Package</th>
        <th>Amount Due</th>
        <th>Travel Date</th> 
        <th>Purchase Date</th> 
     </thead>
     <tbody>
        <?php
                $qry="SELECT * FROM `orderdetails` ";
                //echo($qry);
                $res=mysql_query($qry);
                $i=0;
                while($row=mysql_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo(++$i); ?></td>
            <td><?php echo($row['name']) ?></td>
            <td><?php echo($row['email']) ?></td>
            <td><?php echo($row['packagename']) ?></td>
            <td><?php echo($row['amountduea']) ?></td>
            <td><?php echo($row['traveldate']) ?></td>
            <td><?php echo($row['purchasedate']) ?></td>
            
        </tr>
        <?php
                 }
        ?>
     </tbody>
    </table>
    
<<?php
include_once("assets/inc/foot.php");
?>