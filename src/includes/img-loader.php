<?php 

/**
* Prints the full requested image and a compressed version to the DOM
* @param {string} $imagePathParam - The file path for the full version of the image
*/

class ImgLdr {

   public $imagePath;
   public $imageFilepath;
   public $imageFilename;
   public $imageThumbFilepath;
   public $redirectBack;   

   // When Instatiated get relevant information about the requested images path
   function __construct($imagePathParam) {
      $this->imagePath = $imagePathParam;
      $this->imageFilepath = pathinfo($this->imagePath, PATHINFO_DIRNAME);
      $this->imageFilename = pathinfo($this->imagePath, PATHINFO_FILENAME);
      $this->imageThumbFilepath = $this->imageFilepath . "/" . $this->imageFilename . "-thumb.jpg";
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
      echo "<div class='img-loader-container'>";
      echo "<div class='img-loader__wrapper'>";
      echo "<img 
         id='$this->imagePath' 
         class='img-loader__content img-loader__blur' 
         src='$this->imageThumbFilepath' 
         alt='$this->imageFilename' 
      >";
      echo "</div>";
      echo "</div>";


      return;
   }

   private function create_new_thumb() {
      // Calculate the new size for the image
      $initialSize = getimagesize($this->imagePath);
      $newWidth = 200;
      $newHeight = $newWidth / $initialSize[0] * $initialSize[1];
      
      // Create the new thumbnail image
      $reduced = imagecreatetruecolor($newWidth, $newHeight);
      $original = imagecreatefromjpeg($this->imagePath);
      // header( 'Content-Type: image/jpeg');
      imagecopyresized(
         $reduced,
         $original,
         0,
         0,
         0,
         0,
         $newWidth,
         $newHeight,
         $initialSize[0],
         $initialSize[1]);
      
      // Save the newly created image and then reload the index page
      imagejpeg($reduced, $this->imageThumbFilepath);
      imagedestroy($reduced);
      $this->attempt_to_retrieve_thumb();
   }
}

?>