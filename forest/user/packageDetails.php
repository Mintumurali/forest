<?php
include_once("../dbconnect.php");
loginrequired('user');
$uid=$_SESSION['uid'];
$id=$_GET['id'];
if(!$id){
    header("location:index.php");
}
else{
    $sq="SELECT * FROM `packageinfo` JOIN manager on packageinfo.managerid =manager.AutoId where packageid='$id'";
    //echo $sq;
    if($res=mysql_query($sq)){
        if($row=mysql_fetch_assoc($res)){
             $pname=$row['packagename'];
             $pdisc=$row['packagedetails'];
             $ptypy=$row['packagetype'];
             $pprice=$row['price'];
             $pmanager=$row['Name'];
            $pimg1=$row['imageurl'];
            $pimg2=$row['imageurl2'];
            $pimg3=$row['imageurl3'];
        }
    }
}
?>

<?php
include_once("assets/inc/head.php");
?>
    <div class="jumbotron">
        <h1><?php echo $pname; ?> </h1>
    </div>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../api/<?php echo $pimg1;?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../api/<?php echo $pimg2;?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../api/<?php echo $pimg3;?>')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
<!-- Page Content -->
<section class="py-5">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <h2>
                        <?php echo $pdisc; ?>
                        </h2>
                        
                        <br/>
                        <h4>
                        <B>A <?php echo $ptypy." for ".$pprice." By ".$pmanager ;?></B>

                        </h4>
                    </div>
                    <div class="col-md-4">
                    <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="purchase.php">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Package Name (disabled)</label>
                                                <input type="text" name="packname" class="form-control" readonly placeholder="Company" value="<?php echo $pname; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input type="text" name="uname" class="form-control" placeholder="Company" value="Mike">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email"  name="email" required class="form-control" placeholder="Last Name" value="Andrew">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" name="amt" class="form-control col-md-12 block" readonly value="<?php echo $pprice; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Card No.</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>CVV</label>
                                                <input type="text" class="form-control" >
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Travel Date</label>
                                                <input type="date" name="tdate" class="form-control" >

                                            </div>
                                        </div>
                                    </div>
                                  

                                    <button type="submit" class=" form-control btn btn-info btn-fill block ">Purchase</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>

                       
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
<?php
include_once("assets/inc/foot.php");
?>
