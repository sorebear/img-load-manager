/**
 * imageManagerConstructor handles methods related to swapping low-res photos
 * to high-res on load completion.
 */
class ImageScript {
   /**
    * On instantiation, the constructor will find and store the designated pair of photos;
    */
   constructor(imageFilename) {
      debugger;
      this.highResPhoto = document.querySelector(`[alt=${imageFilename}].img-load-mgr__high-res`);
      this.lowResPhoto = document.querySelector(`[alt=${imageFilename}].img-load-mgr__low-res`);
      this.swapImages();
   }

   /**
   * If the high-res photo is already loaded, swap them immediately
   * Otherwise, instruct the photos to switch once the high-res has loaded
   */
   swapImages() {
      if (this.highResPhoto.complete) {
         this.highResPhoto.classList.remove(
            'img-load-mgr__hidden',
            'img-load-mgr__enlarge'
         );
         this.lowResPhoto.classList.remove(
            'img-load-mgr__enlarge'
         );
      } else {
         this.highResPhoto.onload = () => {
            this.highResPhoto.classList.remove(
               'img-load-mgr__hidden',
               'img-load-mgr__enlarge'
            );
            this.lowResPhoto.classList.remove(
               'img-load-mgr__enlarge'
            );
         };
      }
   };
}
