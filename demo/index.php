<?php 
   include "../build/includes/img-loader.php"; // Script to create, save, and retrieve compressed images
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Image Loader</title>
   <link href="../build/css/main.css" rel="stylesheet">
   <link href="demo.css" rel="stylesheet">
</head>
<body>
   <h1>Image Gallery</h1>
   
   <h3>Aerial Paris</h3>
   <?php new ImgLdr('images/paris.jpg', array("thumbWidth"=>300, "id"=>"paris")); ?>

   <h3>Rooftops in France</h3>
   <?php new ImgLdr('images/rooftops.jpg', array("class"=>"awesome test")); ?>

   <h3>A Parisian Street</h3>
   <?php new ImgLdr('images/narrowroad.jpg'); ?>

   <h3>Umbrellas</h3>
   <?php new ImgLdr('images/craig-whitehead-260310.jpg', array("thumbHeight"=>50)); ?>

   <script src='../build/js/bundle.js'></script>
</body>
</html>