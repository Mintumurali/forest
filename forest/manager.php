<?php
include_once('dbconnect.php');
if(isset($_POST['submit'])){
    $name=$_POST['uname'];
    $password=$_POST['password'];
    $res=mysql_query("select * from `manager` where `Name`='$name' and `Password` ='$password'");
    echo(mysql_error());
    if(mysql_num_rows($res)>0){
        if($row=mysql_fetch_assoc($res)){
            $_SESSION['uid']=$row['AutoId'];
            $_SESSION['utype']='manager';
            header("location:manager/index.php");
        }
    }
    else{
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
<div class="container card">
    
        <form action="" method="post">
        <div class="form-group">
            <label for="uname">User name</label>
            <input type="text" name="uname" id="uname" class="form-control " placeholder="enter user name">
        </div>
        <div class="form-group">
        <label for="uname">Password</label>
        <input type="password" name="password" id="password" class="form-control " placeholder="enter password">
        </div>
        <input type="submit" name="submit" class="form-control m-5 p-4 btn" value="login">
        </form>
</div>
<?php 
include_once("assets/inc/foot.php");
?>
