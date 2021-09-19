<?php
include_once('../dbconnect.php');
loginrequired('manager');
date_default_timezone_set('Asia/Kolkata');

function upload($img){
   
    $target_dir = "../api/images/";
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
            return "images/".basename( $target_file);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return False;
        }
    }
}
if(isset($_POST['submit'])){
    //print(json_encode($_FILES));
    $uid=$_SESSION['uid'];
    $img1=upload("fileToUpload1") or die();
    $img2=upload("fileToUpload2")or die();
    $img3=upload("fileToUpload3")or die();
    $qry="INSERT INTO `packageinfo`
                            (`packageid`, `packagename`, `price`, `packagedetails`, `packagetype`, `imageurl`, `imageurl2`, `imageurl3`, `managerid`) 
                    VALUES ('','$_POST[name]','$_POST[price]','$_POST[details]','$_POST[type]','$img1','$img2','$img3','$uid')";
    if(mysql_query($qry)){
        echo("package added success fully");
        }
}
?>

<?php
include_once("../dbconnect.php");
loginrequired('manager');
include_once("assets/inc/head.php");
?>

    <div class="jumbotron">
        <h1>WELCOME</h1>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
    <input class="input form-control" type="text" name="name" id="name" placeholder="name">
    <input class="input form-control" type="text" name="details" id="details" placeholder="details">
    <input class="input form-control" type="text" name="price" id="price" placeholder="price">
    <input class="input form-control" type="text" name="type" id="type" placeholder="package Type">
    <input class="input form-control" type="file" name="fileToUpload1" id="fileToUpload1" placeholder="img1">
    <input class="btn form-control" type="file" name="fileToUpload2" id="fileToUpload2" placeholder="img2">
    <input class="input form-control" type="file" name="fileToUpload3" id="fileToUpload3" placeholder="img3">
    <input class="btn form-control" type="submit" value="save package" name="submit">
    </form>
 
<?php
include_once("assets/inc/foot.php");
?>



