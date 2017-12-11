<?php 
   // The $img_directory variable will dictate where to find the images to populate the page with
   $img_directory = 'images';
   
   $images = glob("$img_directory/*{jpg,png,jpeg}", GLOB_BRACE); // Makes an array of every image in selected director
   include "img-load-manager/img_compresser.php"; // Script to create, save, and retrieve compressed images
   echo '<link href="img-load-manager/img_style.css" rel="stylesheet" >'; // Required styles for images
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <h1>Image Loader</h1>
   <?php 

      foreach ($images as $image) {
         require "img-load-manager/img.tmpl.php";
      }

      echo '<script src="img-load-manager/img_script.js"></script>'

   ?>
</body>
</html>