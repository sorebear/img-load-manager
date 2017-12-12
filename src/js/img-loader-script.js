/**
 * An instance of the ImageScript is called by img-loader.php
 * Whenever a new image loaded to the DOM
 */
class ImageLoaderScript {
   /**
    * @param {string} imageFilename - The path to the requested image.
    * On instantiation, class will find and store designated pair of photos;
    */
   constructor(imageFilename) {
      this.lowResPhotos = document.getElementsByClassName(
         'img-loader__content'
      );
      this.swapAllImages();
   }

   /**
   * Loops through all the photos in the lowResPhotos array
   * Loads the high-res image and switches the source to it on load completion
   */
   swapAllImages() {
      for (let i = 0; i < this.lowResPhotos.length; i++) {
         const highResPhoto = new Image();
         highResPhoto.src = this.lowResPhotos[i].id;
         highResPhoto.onload = () => {
            this.lowResPhotos[i].src = highResPhoto.src;
            this.lowResPhotos[i].classList.remove('img-loader__blur');
         };
      }
   }
}

export default ImageLoaderScript;
