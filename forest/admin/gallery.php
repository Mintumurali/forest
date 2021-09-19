<?php
include_once("../dbconnect.php");
loginrequired('admin');


function upload($img){
   
    $target_dir = "uploads/gal/";
    $nowTime5=md5(date("H:i:s"));
    //echo($nowTime5);
    $target_file = $target_dir .$nowTime5.basename($_FILES[$img]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$img]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        //echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    // if ($_FILES["fileToUpload"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    // }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return FALSE;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$img]["tmp_name"], $target_file)) {
           // echo "The file ". basename( $_FILES[$img]["name"]). " has been uploaded.";
            return basename( $target_file);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return False;
        }
    }
}


if(isset($_POST['btn'])){
    $location=$_POST['loc'];
    $name=upload("gimg") or die("error occured");
    //$password=$_POST['password'];
    $qry="INSERT INTO `galleryimages` (`imageid`,`imagelocation`, `imageurl`) VALUES (NULL,'$location' ,'$name');";
    if(mysql_query($qry)){
        echo("image added successfully");
    }
}
?>



<?php
include_once("assets/inc/head.php");
?>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Images</h4>
                            </div>
                            <div class="content">
                            <form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5 px-20l">
                                            <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" required class="form-control" name="gimg" id="gimg" >
                                        </div>
                                        </div>
                                        <div class="col-md-3 px-20l">
                                            <div class="form-group">
                                                <label>Loction</label>
                                                <input type="text" required name="loc" id="loc" class="form-control" >
                                            </div>
                                        </div>
                                        
                                    </div>

                                 

                                     <input type="submit" name="btn" class="btn btn-info btn-fill pull-right"  value="upload">
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                   
                </div>

                 <div class="card col-4">
      <table class="table">
      <thead>
      
      </thead>
      <tbody>
      <?php 
      $qr="select * From galleryimages";
      $res=mysql_query($qr);
      $i=0;
      while($row=mysql_fetch_assoc($res)){

      
      $i++;
      ?>
    
      <tr>
      <td><?php echo $i;?></td>
      <td><div widh="500" height="500"> 
        <img  widh="100" height="100" src="uploads/gal/<?php echo $row['imageurl']; ?>" alt="<?php echo $row['imageurl']; ?>" >
      </div></td>
      <td><?php echo $row['imagelocation']; ?></td>
      <td><a href="delGal.php?id=<?php echo $row['imageid'];?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php 
      }
       ?>
      </tbody>
      
      </table>
    </div>
            </div>
        </div>






   
  
<?php
include_once("assets/inc/foot.php");
?>



