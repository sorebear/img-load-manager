/**
 * An instance of the ImageScript is called by img-loader.php
 * Whenever a new image loaded to the DOM
 */
class ImageScript {
   /**
    * @param {string} imageFilename - The path to the requested image.
    * On instantiation, class will find and store designated pair of photos;
    */
   constructor(imageFilename) {
      debugger;
      this.highResPhoto = document.querySelector(
         `[alt=${imageFilename}].img-loader__high-res`
      );
      this.lowResPhoto = document.querySelector(
         `[alt=${imageFilename}].img-loader__low-res`
      );
      this.swapImages();
   }

   /**
   * If the high-res photo is already loaded, swap them immediately
   * Otherwise, instruct the photos to switch once the high-res has loaded
   */
   swapImages() {
      if (this.highResPhoto.complete) {
         this.highResPhoto.classList.remove(
            'img-loader__hidden',
            'img-loader__enlarge'
         );
         this.lowResPhoto.classList.remove(
            'img-loader__enlarge'
         );
      } else {
         this.highResPhoto.onload = () => {
            this.highResPhoto.classList.remove(
               'img-loader__hidden',
               'img-loader__enlarge'
            );
            this.lowResPhoto.classList.remove(
               'img-loader__enlarge'
            );
         };
      }
   };
}
