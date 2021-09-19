<?php
include_once("../dbconnect.php");
loginrequired('manager');
include_once("assets/inc/head.php");
?>

    <div class="jumbotron">
        <h1>WELCOME</h1>
    </div>
    <ul>
        <li><a href="add_package.php">Add Package</a></li>
        <li><a href="manage_Package.php">manage Packages</a></li>
    </ul>
<?php
include_once("assets/inc/foot.php");
?>
