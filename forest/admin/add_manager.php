<?php
include_once("../dbconnect.php");
loginrequired('admin');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $Gender=$_POST['Gender'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $parkname=$_POST['parkname'];
    $password=$_POST['password'];
    $qry="INSERT INTO `manager`(`AutoId`,`Name`,`Gender`,`address`,`mobile`,`parkname`,`Password`) VALUES ('','$name','$Gender','$address','$mobile','$parkname','$password')";
    if(mysql_query($qry)){

?>

<script type="text/javascript">
    window.alert("Manager added successfully");
</script>

<?php
        // echo("manager added successfully");


    }
}
?>

<?php
include_once("../dbconnect.php");
loginrequired('admin');
include_once("assets/inc/head.php");
?>
    <div class="jumbotron">
        <h1>Add Partner</h1>
    </div>
    <div class="card col-4">
    <form action="" method="post" class="form">
    <div class="card-body">
        <label for=""><h5>Partner Name</h5></label>
        <input  class="form-control" type="text" name="name" id="name" placeholder="name">
        <label for=""><h5>Sex</h5></label>
        <input  class="form-control" type="text" name="Gender" id="Gender" placeholder="Gender">
        <label for=""><h5>Address</h5></label>
        <input  class="form-control" type="text" name="address" id="address" placeholder="address">
        <label for=""><h5>Mobile Number</h5></label>
        <input  class="form-control" type="text" name="mobile" id="mobile" placeholder="mobile">
        <label for=""><h5>Park Name</h5></label>
        <input  class="form-control" type="text" name="parkname" id="parkname" placeholder="parkname">
        <label for=""><h5>Partner Password</h5></label>
        <input type="password"  class="form-control" name="password" id="password" placeholder="password">
    </div>
    <div class="card-footer">
     <button type="submit"  class="btn btn-primary mb1 bg-black" name="submit" > Add Partner</button>
     </div>
    </form>
   
    </div>
<?php
include_once("assets/inc/foot.php");
?>



