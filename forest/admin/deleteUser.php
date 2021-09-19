<?php

include_once("../dbconnect.php");
loginrequired('admin');

$idd = $_GET['id'];

if ($idd) {
           
        $sql="update register set status = 1 where userid = ".$idd;
        $rs=mysql_query($sql);

        if ( $rs === TRUE) {
           ?>

           <script type="text/javascript">
               window.alert("User deleted successfully");
                 window.location="all_users.php";
           </script>
           <?php
        }
    }


?>