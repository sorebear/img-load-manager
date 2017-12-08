<!--Code Snippet #1: Place this at the top of the file in which you will be placing pictures-->
<?php 
   // The $img_directory variable will dictate where to find the images to populate the page with
   $img_directory = 'img-load-manager/images';
   
   $images = glob("$img_directory/*{jpg,png,jpeg}", GLOB_BRACE); // Makes an array of every image saved in the directory 'img/full/';
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
   <h1>Image Load Manager</h1>

   <!--Code Snippet #2: Place where you would like your image(s) to be rendered-->
   <?php 

      foreach ($images as $image) {
         require "img-load-manager/img.tmpl.php";
      }

      echo '<script src="img-load-manager/img_script.js"></script>'

   ?>
   
</body>
</html>