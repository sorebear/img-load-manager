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

### Setting Up In A File

First, put the following PHP tag at the *top of your PHP document*

```
<?php 
   include "../build/includes/img-loader.php"; // Script to create, save, and retrieve compressed images
?>
```


Second, put the following PHP tag *within your document <head>*

```
<?php 
   echo '<link href="../build/css/main.css" rel="stylesheet" >'; // Required styles for images
   echo '<script src="../build/js/img-loader-script.js"></script>';
?>
```


Third, place the following PHP tag at the *bottom of your document <body>*

```
<?php
      // Call the ImageLoaderScript class, telling the images to switch when the high-res photo finishes loading
      echo "<script>var imgloader = new ImageLoaderScript</script>"
   ?>
```


## Usage

### Instantiation

Place the following tag wherever you would like to load an image, passing in the path to your desired image as the argument for ImgLdr().

```
<?php new ImgLdr("images/your-image.jpg"); ?>
```


### Customizing

All img-load-manager images are placed within a div with the class "img-loader-container", which you can target for your CSS styles.

```
.img-loader-container {
   width: 50%;
   float: left;
   padding: 5rem;
}
```


## Authors

* **Soren Baird** - [sorebear](https://github.com/sorebear)


## Acknowledgments

* Thank you to Envivent and Jaime Rodriguez for giving me this project and reviewing my work. 
