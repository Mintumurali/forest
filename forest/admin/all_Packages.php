<?php
include_once("../dbconnect.php");
loginrequired('admin');
include_once("assets/inc/head.php");
?>
<div class="jumbotron">
        <h1>All Package</h1>
    </div>
<table class="table">
<?php

$qry="SELECT * FROM `packageinfo`";
//echo($qry);
$res=mysql_query($qry);
$i=0;
while($row=mysql_fetch_assoc($res)){
    ?>
    <tr>
        <td><?php echo ++$i; ?></td>
        <td> 
            <div width="500" height="500"> 
             <img  width="210" height="230" src="../api/<?php echo $row['imageurl']; ?>">
            </div>
        </td>
        <td> 
            <div class="description">
                <?php
                    echo $row['packagename'];
                ?>
                
                <br>
                Rs.
                <?php
                 echo $row['price'];
                ?> 
            </div>
        </td>
        <td> <a href="deletePackage.php?id=<?php echo $row['packageid']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php 
}
?>
</table>
    

    
    
    


    
<?php
include_once("assets/inc/foot.php");
?>