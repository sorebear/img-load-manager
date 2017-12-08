<?php 

/**
* Return a compressed version of the requested image or create one and then redirect user back to the requesting page, which will rerun this script.
* @param {string} $imagePath - The file path for the full version of the image
* @return {string} - The file path for the compressed version of the requested image
*/
function compress_image($imagePath) {
   $redirectBack = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_BASENAME);
   $imageFilename = pathinfo($imagePath, PATHINFO_FILENAME);
   $imageFilepath = pathinfo($imagePath, PATHINFO_DIRNAME);

   // If the 'thumb' director does not exist, create it
   if (!file_exists("$imageFilepath/thumb")) {
      mkdir("$imageFilepath/thumb");
   }

   // If a thumbnail of the requested image exists, return it
   if (file_exists("$imageFilepath/thumb/" . $imageFilename . "-thumb.jpg")) {
      return ("$imageFilepath/thumb/" . $imageFilename . "-thumb.jpg");
   }

   // Otherwise create a new thumbnail image  
   
   // Calculate the new size for the image
   $initialSize = getimagesize($imagePath);
   $newWidth = 200;
   $newHeight = $newWidth / $initialSize[0] * $initialSize[1];
   
   // Create the new thumbnail image
   $reduced = imagecreatetruecolor($newWidth, $newHeight);
   $original = imagecreatefromjpeg($imagePath);
   header( 'Content-Type: image/jpeg');
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
   imagejpeg($reduced, $imageFilepath . "\/thumb/" . $imageFilename . "-thumb.jpg");
   imagedestroy($reduced);
   header("Location: $redirectBack");
}

?>