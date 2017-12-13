<?php 

/**
* Prints the full requested image and a compressed version to the DOM
* @param {string} $imagePathParam - The file path for the full version of the image
*/

class ImgLdr {

   private $imagePath;
   private $imageFilepath;
   private $imageFilename;
   private $imageThumbFilepath;
   private $thumbWidth;
   private $thumbHeight;
   private $class;
   private $id;

   // When Instatiated get relevant information about the requested images path
   function __construct($imagePathParam, $customSet = array()) {
      // Variables set based on $imagePathParam argument
      $this->imagePath = $imagePathParam;
      $this->imageFilepath = pathinfo($this->imagePath, PATHINFO_DIRNAME);
      $this->imageFilename = pathinfo($this->imagePath, PATHINFO_FILENAME);
      $this->imageThumbFilepath = $this->imageFilepath . "/" . $this->imageFilename . "-thumb.jpg";

      // Variables set based on option $customSet argument
      $this->thumbWidth = isset($customSet['thumbWidth']) ? $customSet['thumbWidth'] : null;
      $this->thumbHeight = isset($customSet['thumbHeight']) ? $customSet['thumbHeight'] : null;
      $this->class = isset($customSet['class']) ? $customSet['class'] : '';
      $this->id = isset($customSet['id']) ? $customSet['id'] : $this->imageFilename;

      $this->attempt_to_retrieve_thumb();
   }

   private function attempt_to_retrieve_thumb() {
      // If a thumbnail of the requested image exists, return it
      if (file_exists($this->imageThumbFilepath)) {
         $this->create_image_on_page();
         return;
      }
      // Otherwise create the thumbnail
      $this->create_new_thumb();
   }

   private function create_image_on_page() {
      // Prints the high-res and low-res images to the DOM wrapped inside of two divs
      echo "<div id='$this->id' class='img-loader-container $this->class'>";
      echo "<img 
         id='$this->imagePath' 
         class='img-loader__content--lr' 
         src='$this->imageThumbFilepath' 
         alt='$this->imageFilename' 
      >";
      echo "</div>";


      return;
   }

   private function create_new_thumb() {
      // Calculate the new size for the image
      $initialSize = getimagesize($this->imagePath);
      if ($this->thumbHeight) {
         if (!$this->thumbWidth) {
            $this->thumbWidth = $this->thumbHeight / $initialSize[1] * $initialSize[0];
         }
      } else {
         $this->thumbWidth = $this->thumbWidth ? $this->thumbWidth : 200;
         $this->thumbHeight = $this->thumbWidth / $initialSize[0] * $initialSize[1];
      }

      // Create the new thumbnail image
      $reduced = imagecreatetruecolor($this->thumbWidth, $this->thumbHeight);
      $original = imagecreatefromjpeg($this->imagePath);
      imagecopyresized(
         $reduced,
         $original,
         0,
         0,
         0,
         0,
         $this->thumbWidth,
         $this->thumbHeight,
         $initialSize[0],
         $initialSize[1]);
      
      // Save the newly created image and then reload the index page
      imagejpeg($reduced, $this->imageThumbFilepath);
      imagedestroy($reduced);
      $this->attempt_to_retrieve_thumb();
   }
}

?>