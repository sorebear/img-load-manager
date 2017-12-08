# img-load-manager

A small library that creates a compressed image, displays the compressed image on the DOM until the full image is loaded, then replaces the compressed image with the full one.

## Getting Started

These instructions will get the library set up and running on your local machine for immediate use.

### Installing

First, clone this repo into your working project. 

```
git clone https://github.com/sorebear/img-load-manager.git
```


Second, open up the PHP document where you'd like to display images and place the following code at the top of the file.

```
<?php 
   // The $img_directory variable will dictate where to find the images to populate the page with
   $img_directory = 'img-load-manager/images';
   
   $images = glob("$img_directory/*{jpg,png,jpeg}", GLOB_BRACE); // Makes an array of every image in selected director
   include "img-load-manager/img_compresser.php"; // Script to create, save, and retrieve compressed images
   echo '<link href="img-load-manager/img_style.css" rel="stylesheet" >'; // Required styles for images
?>
```

* You can change the $img-directory to point to any directory within your project containing images. The created thumbnails will be placed into a folder called "thumb" which will be nested in the designated image direcotry. 

_**Note:** that all images in this folder will be selected and displayed in alaphanumeric order by filename._


Third, place the following code within the page body, where you would like your image(s) to be displayed.

```
   <?php 

      foreach ($images as $image) {
         require "img-load-manager/img.tmpl.php";
      }

      echo '<script src="img-load-manager/img_script.js"></script>'

   ?>

```

### Customizing

All img-load-manager images are placed within a div with the class "img-load-mgr-container", which you can target for your CSS styles.

```
.img-load-mgr-container {
   width: 50%;
   float: left;
   padding: 5rem;
}

```

## Example

Here is what a full basic gallery page might look like. You can also see a full example by switching to the *example* branch - https://github.com/sorebear/img-load-manager/tree/example

```
<?php 

   $img_directory = 'img-load-manager/gallery_1';
   
   $images = glob("$img_directory/*{jpg,png,jpeg}", GLOB_BRACE); 
   include "img-load-manager/img_compresser.php";
   echo '<link href="img-load-manager/img_style.css" rel="stylesheet" >';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Image Load Manager - Gallery</title>
   <link href="style.css" rel="stylesheet">
   <style>
     .img-load-mgr-container {
       width: 100%;
       padding: 1rem;
     }
   </style>
</head>
<body>
   <h1>Image Load Manager - Gallery</h1>

   <!--Code Snippet #2: Place where you would like your image(s) to be rendered-->
   <?php 

      foreach ($images as $image) {
         require "img-load-manager/img.tmpl.php";
      }

      echo '<script src="img-load-manager/img_script.js"></script>'

   ?>
  
</body>
</html>

```

## Authors

* **Soren Baird** - *Initial work* - [sorebear](https://github.com/sorebear)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Thank you to Envivent and Jaime Rodriguez for giving me this project and reviewing my work. 
