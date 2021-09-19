<?php
include_once('dbconnect.php');
if(isset($_POST['submit'])){
    $name=$_POST['uname'];
    $password=$_POST['password'];
    $res=mysql_query("select * from `admin` where `Name`='$name' and `Password` ='$password'");
    echo(mysql_error());
    if(mysql_num_rows($res)>0){
        if($row=mysql_fetch_assoc($res)){
            $_SESSION['uid']=$row['AutoId'];
            $_SESSION['utype']='admin';
            header("location:admin/index.php?uid=".$_SESSION['uid']);
        }
    }else{
        
        echo("<script>var invalid=true</script>");
    }
}
?>
<?php 
include_once("assets/inc/head.php");
?>
<style>
    html,
body {
    height: 100%;
}

.container {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
 <h2 align="center"> ADMIN LOGIN </h2>

<div class="container card">

        <form action="" method="post">
        <div class="form-group">
            <label for="uname">User name</label>
            <input type="text" name="uname" id="uname" class="form-control " placeholder="Enter user name">
        </div>
        <div class="form-group">
        <label for="uname">Password</label>
        <input type="password" name="password" id="password" class="form-control " placeholder="Enter Password">
        </div>
        <input type="submit" name="submit" class="btn btn-primary mb1 black bg-aqua" value="login">
        </form>
</div>
<?php 
include_once("assets/inc/foot.php");
?>
