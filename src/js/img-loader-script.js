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
      this.lrPhotos = document.getElementsByClassName(
         'img-loader-container'
      );
      this.swapAllImages();
   }

   /**
   * Loops through all the photos in the lrPhotos array
   * Loads the high-res image and switches the source to it on load completion
   */
   swapAllImages() {
      for (let i = 0; i < this.lrPhotos.length; i++) {
         const hrPhoto = new Image();
         hrPhoto.src = this.lrPhotos[i].firstChild.id;
         hrPhoto.classList.add('img-loader__content--hr');
         hrPhoto.onload = () => {
            this.lrPhotos[i].appendChild(hrPhoto);
            hrPhoto.classList.add('img-loader__loaded');
         };
      }
   }
}

export default ImageLoaderScript;
