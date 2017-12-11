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
<body>
   <h1>Image Loader</h1>
   <?php new imgLdr('images/paris.jpg'); ?>
</body>
</html>