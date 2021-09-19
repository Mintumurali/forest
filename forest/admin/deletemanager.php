<?php

include_once("../dbconnect.php");
loginrequired('admin');

$idd = $_GET['id'];

if ($idd) {
           
        $sql="update manager set status = 1 where AutoId = ".$idd;
        $rs=mysql_query($sql);

        if ( $rs === TRUE) {
           ?>

           <script type="text/javascript">
               window.alert("Manager Has Removed successfully");
                 window.location="all_mangers.php";
           </script>
           <?php
        }
    }


?>