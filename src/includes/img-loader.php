<?php 

/**
* Return a compressed version of the requested image or create one and then redirect user back to the requesting page, which will rerun this script.
* @param {string} $imagePath - The file path for the full version of the image
* @return {string} - The file path for the compressed version of the requested image
*/

class imgLdr {

   public $imagePath;
   public $imageFilepath;
   public $imageFilename;
   public $imageThumbFilepath;
   public $redirectBack;   

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

      $this->create_new_thumb();
   }

   private function create_image_on_page() {
      echo "<div class='img-load-mgr-container'>";
      echo "<div class='img-load-mgr__img-wrapper'>";
      echo "<img class='img-load-mgr__low-res img-load-mgr__enlarge' src=$this->imageThumbFilepath alt=$this->imageFilename >";
      echo "<img class='img-load-mgr__high-res img-load-mgr__hidden img-load-mgr__enlarge' src=$this->imagePath alt=$this->imageFilename >";
      echo "</div>";
      echo "</div>";
      echo "<script> var $this->imageFilename = new ImageScript('$this->imageFilename') </script>";
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
      imagejpeg($reduced, $this->$imageThumbFilepath);
      imagedestroy($reduced);
      $this->attempt_to_retrieve_thumb();
   }
}

?>