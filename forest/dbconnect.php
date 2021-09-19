<?php
session_start();
mysql_connect("localhost", "root", "");
mysql_select_db("forest");
//echo("sad");

function loginrequired($var)
{
    # code...
    if(!isset($_SESSION['uid']) || $_SESSION['utype']!=$var){
        die("no autharization");
    }
}
?>