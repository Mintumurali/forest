<?php
include_once("../dbconnect.php");
loginrequired('admin');
include_once("assets/inc/head.php");
?>
<div class="jumbotron">
        <h1>All Manager</h1>
    </div>
 
<table class="table">
     <thead>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Address</th>
        <th>Mobile number</th>
         <th>Park Name</th>
        <th>Remove</th>
     </thead>
     <tbody>
        <?php
                $qry="SELECT * FROM `manager`where status = 0";
                //echo($qry);
                //echo($qry);
                $res=mysql_query($qry);
                $i=0;
                while($row=mysql_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo(++$i); ?></td>
            <td><?php echo($row['Name']) ?></td>
             <td><?php echo($row['address']) ?></td>
              <td><?php echo($row['mobile']) ?></td>
               <td><?php echo($row['parkname']) ?></td>
                <?php $idd= $row['AutoId'];  $idd; ?>
             <td><a href="deletemanager.php?id=<?php echo $idd ?>" class=btn btn-danger>Delete</a></td>
        </tr>
        <?php
                 }
        ?>
     </tbody>
    </table>
    <?php
include_once("assets/inc/foot.php");
?>