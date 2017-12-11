# img-loader
A small library to create a better image loading experience for your users. This library creates a thumbnail image, displays the blurred thumbnail on the DOM until the full image is loaded, then replaces the thumbnail with the full image.

## Getting Started

These instructions will get the library set up and running on your local machine for immediate use.

### Installing

First, clone this repo into your working project. 

```
git clone https://github.com/sorebear/img-loader.git
```

Second, navigate into the directory and install the necessary modules.

```
npm install
```

Third, create the build

```
npm start
```

### Usage

Open up the PHP document where you'd like to display images and place the following code at the top of the file.

```
<?php 
   include "../build/includes/img-loader.php"; // Script to create, save, and retrieve compressed images
   echo '<link href="../build/css/main.css" rel="stylesheet" >'; // Required styles for images
   echo '<script src="../build/js/img-loader-script.js"></script>';
?>
```

Then, place the following tag wherever you would like to load an image. Make sure the string passed in is pointing to the image you want to display.

```
<?php new imgLdr("images/your-image.jpg"); ?>

```

### Customizing

All img-load-manager images are placed within a div with the class "img-loader-container", which you can target for your CSS styles.

```
.img-load-mgr-container {
   width: 50%;
   float: left;
   padding: 5rem;
}

```

## Authors

* **Soren Baird** - [sorebear](https://github.com/sorebear)

## Acknowledgments

* Thank you to Envivent and Jaime Rodriguez for giving me this project and reviewing my work. 
