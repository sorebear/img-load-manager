<?php 
   include "../build/includes/img-loader.php"; // Script to create, save, and retrieve compressed images
   echo '<link href="../build/css/main.css" rel="stylesheet" >'; // Required styles for images
   echo '<script src="../build/js/img-loader-script.js"></script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Image Loader</title>
</head>
<style>
   * {
      margin: 0;
      padding: 0;
   }

   body {
      background-color: #333;
      text-align: center;
      font-size: 62.5%;
      color: white;
      font-family: Arial, sans-serif;
   }

   h1 {
      font-size: 3rem;
      padding: 3rem 0;
   }

   .img-loader-container {
      padding: 1rem 2rem;
      margin-bottom: 4rem;
   }

</style>
<body>
   <h1>Image Gallery</h1>
   
   <h3>Aerial Paris</h3>
   <?php new imgLdr('images/paris.jpg'); ?>

   <h3>Rooftops in France</h3>
   <?php new imgLdr('images/rooftops.jpg'); ?>

   <h3>A Parisian Street</h3>
   <?php new imgLdr('images/narrowroad.jpg'); ?>

</body>
</html>