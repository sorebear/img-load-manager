/**
 * imageManagerClass handles methods related to swapping low-res photos
 * to high-res on load completion.
 */
class imageManagerClass {
   /**
    * On instantiation, the constructor will find and store all photos in DOM
    * Then run the init() method
    */
   constructor() {
      /**
       * Creates a node list of all the high resolution photos in the DOM
       */
      this.highResArray =
         document.getElementsByClassName('img-load-mgr__high-res');
      this.lowResArray =
         document.getElementsByClassName('img-load-mgr__low-res');
      this.init();
   }
   /**
    * The init method is called on instantiation
    * And delegates initializing functions.
    */
   init() {
      this.swapAllImages();
   }

   /**
   * Loops through high-res photos, instructing them to become opaque on load
   * Instructs high-res/low-res images to shrink after the high-res photo loads
   */
   swapAllImages() {
      const self = this;
      for (let i = 0; i <this.highResArray.length; i++) {
         (function(i) {
            setTimeout(function() {
               if (self.highResArray[i].complete) {
                  self.highResArray[i].classList.remove(
                     'img-load-mgr__hidden',
                     'img-load-mgr__enlarge'
                  );
                  self.lowResArray[i].classList.remove(
                     'img-load-mgr__enlarge'
                  );
               } else {
                  self.highResArray[i].onload = function() {
                     self.highResArray[i].classList.remove(
                        'img-load-mgr__hidden',
                        'img-load-mgr__enlarge'
                     );
                     self.lowResArray[i].classList.remove(
                        'img-load-mgr__enlarge'
                     );
                  };
               }
            });
         })(i);
      }
   }
}

const imageManager = new imageManagerClass;
