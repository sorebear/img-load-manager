<?php 
   // The $img_directory variable will dictate where to find the images to populate the page with
   $img_directory = 'gallery-2';
   
   $images = glob("$img_directory/*{jpg,png,jpeg}", GLOB_BRACE); // Makes an array of every image saved in the selected director
   include "img-load-manager/img_compresser.php"; // The script that creates, saves, and retrieves compressed images
   echo '<link href="img-load-manager/img_style.css" rel="stylesheet" >'; // The required styles for the images
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Image Load</title>
   <link href="style.css" rel="stylesheet">
</head>
<body>
   <h2>Gallery 2 - Coffee Shops</h2>
   <a href="index.php"><p>Back To Home</p></a>
   <a href="gallery.php"><p>Go To Gallery 1</p></a>
   <?php 

      foreach ($images as $image) {
         require "img-load-manager/img.tmpl.php";
      }

      echo '<script src="img-load-manager/img_script.js"></script>'

   ?>
   
</body>
</html>