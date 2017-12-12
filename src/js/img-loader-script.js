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
         'img-loader__low-res'
      );
      this.swapAllImages();
   }

   /**
   * If the high-res photo is already loaded, swap them immediately
   * Otherwise, instruct the photos to switch once the high-res has loaded
   */
   swapAllImages() {
      for (let photo of this.lowResPhotos) {
         const highResPhoto = new Image();
         highResPhoto.src = photo.id;
         highResPhoto.onload = () => {
            photo.src = highResPhoto.src;
         };
      }
   }

   // swapImages() {
   //    if (this.highResPhoto.complete) {
   //       this.highResPhoto.classList.remove(
   //          'img-loader__hidden',
   //          'img-loader__enlarge'
   //       );
   //       this.lowResPhoto.classList.remove(
   //          'img-loader__enlarge'
   //       );
   //    } else {
   //       this.highResPhoto.onload = () => {
   //          this.highResPhoto.classList.remove(
   //             'img-loader__hidden',
   //             'img-loader__enlarge'
   //          );
   //          this.lowResPhoto.classList.remove(
   //             'img-loader__enlarge'
   //          );
   //       };
   //    }
   // };
}

// export default ImageLoaderScript;
