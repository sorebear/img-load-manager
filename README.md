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

### Setting Up

First, put the following PHP tag at the *top of your PHP document*

```
<?php 
   include "../build/includes/img-loader.php"; // Script to create, save, and retrieve compressed images
?>
```


Second, for the necessary styling, put the following link tag *within your document \<head>*

```
<link href="../build/css/main.css" rel="stylesheet">
```


Third, call the bundle.js file at the *bottom of your document \<body>*

```
<script src='../build/js/bundle.js'></script>
```


## Usage

### Your Scripts

This project is already configured to compile your code with Webpack. Simply add or import your code to the 'src/js/index.js' file.

```
import ImageLoaderScript from './img-loader-script.js';

// Add Your Imports Here

const imageLoaderScript = new ImageLoaderScript; // Instatiate ImageLoaderScript

// Add Your Code Here
```

### Instantiation

Place the following tag wherever you would like to load an image, passing in the path to your desired image as the argument for ImgLdr().

```
<?php new ImgLdr("images/your-image.jpg"); ?>
```


### Customizing

By default, all img-load-manager images are placed within a div with the class "img-loader-container" and an id matching the image filename. You can target these elements for your CSS styling. 

```
.img-loader-container {
   width: 50%;
   float: left;
}

#my-photo {
   padding: 5rem;
}
```
### Advanced Customization

You can pass in an associate array as an optional second argument to your PHP call for further customization. 

#### Here are the keys and values this associative array will take:
* `@param 'thumbWidth' {number}` - Specify the desired width for created thumbnail \(*ex - 100*)
* `@param 'thumbHeight' {number}` - Specify the desired height for created thumbnail \(*ex - 50*)
* `@param 'class' {string}` - Specify additional class(es) for image container. Seperate multiple classes by spaces \(*ex - 'gallery-images my-class'*)
* `@param 'id' {string}` - Specify custom id to give the image container \(*ex - 'paris'*)

```
<?php new ImgLdr('images/paris.jpg', array( "thumbHeight"=>300, "id"=>"paris", "class"=> "my-class my-images" )); ?>
```
*Note: If you pass both a `thumbWidth` and `thumbHeight` it may skew your image. If you pass only one or neither, the aspect ratio will be maintained*

## Authors

* **Soren Baird** - [sorebear](https://github.com/sorebear)


## Acknowledgments

* Thank you to Envivent and Jaime Rodriguez for giving me this project and reviewing my work. 
