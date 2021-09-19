<?php
include_once('dbconnect.php');
$res=mysql_query("select * from `galleryimages`");

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Magnific gallery</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:300,600'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css'>

      <link rel="stylesheet" href="gal/css/style.css">

  
</head>

<body>
  <article class='gallery'>


  <?php if(mysql_num_rows($res)>0){
        while($row=mysql_fetch_assoc($res)){
            ?>
            <a class='gallery-link' href='user.php'>
            <figure class='gallery-image'>
              <img height='1400' src='admin/uploads/gal/<?php echo $row['imageurl'];?>' width='1000'>
              <figcaption><?php echo $row['imagelocation'];?></figcaption>
            </figure>
          </a>
          <?php
           
        }
    }
    
    ?>

</article>
<footer id='footer' role='contentinfo'>
  <div class='container'>
    <a class='logo' href='#' rel='home'>Gallery</a>
    <a class='copy' href='./'>Home</a>
  </div>
</footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js'></script>
<script src='gal/js/xgrmnr.js'></script>

    <script  src="gal/js/index.js"></script>

</body>
</html>
