<?php
include_once("../dbconnect.php");
loginrequired('user');
$uid=$_SESSION['uid'];
?>

<?php
include_once("assets/inc/head.php");
?>
<link rel="stylesheet" href="assets/styletoo.css">
    <div class="jumbotron">
        <h1>WELCOME</h1>
    </div>

<header> <h3>All Packages <?php echo $uid; ?></h3></header>
<br>
<div id="featured" style="background: url(&quot;img/featured_bg4.gif&quot;) -30px -55.6709px;">
<div id="items">
        <?php

        $qry="SELECT * FROM `packageinfo`";
        //echo($qry);
        $res=mysql_query($qry);
        $i=0;
        while($row=mysql_fetch_assoc($res)){
            ?>
		<div class="item">
            <a href="packageDetails.php?id=<?php echo $row['packageid'];?>" target="_blank">
            <div width="500" height="500"> 
                <img  width="210" height="230" src="../api/<?php echo $row['imageurl']; ?>">
            </div>
			
			<div class="description">
                <?php
                echo $row['packagename'];
                ?>
                <div class="arrow"></div>
                <br>
                Rs.
                <?php
                echo $row['price'];
                ?> 
            </div>
            
			</a>
        </div>
        <?php 
        }
        ?>
		
    </div>
</div>
<?php /*
<table class="table">
     <thead>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Details</th>
        <th>Price</th>
        <!-- <th>Status</th> -->
        <th>Option</th>
     </thead>
     <tbody>
        <?php

        $qry="SELECT * FROM `packages` where Active=1";
        //echo($qry);
        $res=mysql_query($qry);
        $i=0;
        while($row=mysql_fetch_assoc($res)){
            ?>
        <tr>
        <td><?php echo(++$i); ?></td>
        <td><?php echo($row['PackageName']) ?></td>
        <td><?php echo($row['PackageDetails']) ?></td>
        <td><?php echo($row['Price']) ?></td>
        <td>
        <a class="btn" href="purchase.php?id=<?php  echo($row['AutoId']);?>">Purchase</a>
        </td>
        </tr>
        <?php
        }
        ?>
     </tbody>
    </table>*/ ?>
<br>
<br>    

<header><h3>Your Bookings</h3></header>
<br>
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
                $qry="SELECT * FROM `orderdetails` where email = '".$_SESSION['mail']."'";
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
    





<?php
include_once("assets/inc/foot.php");
?>
