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
   <?php 
      echo '<link href="../build/css/main.css" rel="stylesheet" >'; // Required styles for images
      echo '<script src="../build/js/img-loader-script.js"></script>'; // Include the ImageLoader Class
   ?>
   <link href="demo.css" rel="stylesheet">
</head>
<body>
   <h1>Image Gallery</h1>
   
   <h3>Aerial Paris</h3>
   <?php new ImgLdr('images/paris.jpg'); ?>

   <h3>Rooftops in France</h3>
   <?php new ImgLdr('images/rooftops.jpg'); ?>

   <h3>A Parisian Street</h3>
   <?php new ImgLdr('images/narrowroad.jpg'); ?>

   <h3>Umbrellas</h3>
   <?php new ImgLdr('images/craig-whitehead-260310.jpg'); ?>

   <?php
      // Call the ImageLoaderScript class, telling the images to switch when the high-res photo finishes loading
      echo "<script>var imgloader = new ImageLoaderScript</script>"
   ?>
</body>
</html>