<?php
    include_once("../dbconnect.php");
    loginrequired('admin');
    include_once("assets/inc/head.php");
?>
<div class="jumbotron">
        <h1>All Users</h1>
    </div>
<table class="table">
     <thead>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Remove</th>
     </thead>
     <tbody>
        <?php
                $qry="SELECT * FROM `register` where status = 0";
                //echo($qry);
                $res=mysql_query($qry);
                $i=0;
                while($row=mysql_fetch_assoc($res)){
        ?>
        <tr>
            <td><?php echo(++$i); ?></td>
            <td><?php echo($row['name']) ?></td>
            <td><?php echo($row['email']) ?></td>
           <?php $idd= $row['userid'];  $idd; ?>
            <td><a href="deleteUser.php?id=<?php echo $idd ?>" class=btn btn-danger>Delete</a></td>
        </tr>
        <?php
                 }
        ?>
     </tbody>
    </table>
    
    <?php
        
        

    
       
include_once("assets/inc/foot.php");
?>