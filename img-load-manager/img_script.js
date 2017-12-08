/**
 * imageManagerConstructor handles methods related to swapping low-res photos
 * to high-res on load completion.
 */
function ImageManagerConstructor() {
   /**
    * On instantiation, the constructor will find and store all photos in DOM
    */
   var highResArray = document.getElementsByClassName('img-load-mgr__high-res');
   var lowResArray = document.getElementsByClassName('img-load-mgr__low-res');

   /**
   * Loops through high-res photos, instructing them to become opaque on load
   * Instructs high-res/low-res images to shrink after the high-res photo loads
   */
   swapAllImages = function() {
      for (var i = 0; i < highResArray.length; i++) {
         (function(i) {
            setTimeout(function() {
               if (highResArray[i].complete) {
                  highResArray[i].classList.remove(
                     'img-load-mgr__hidden',
                     'img-load-mgr__enlarge'
                  );
                  lowResArray[i].classList.remove(
                     'img-load-mgr__enlarge'
                  );
               } else {
                  highResArray[i].onload = function() {
                     highResArray[i].classList.remove(
                        'img-load-mgr__hidden',
                        'img-load-mgr__enlarge'
                     );
                     lowResArray[i].classList.remove(
                        'img-load-mgr__enlarge'
                     );
                  };
               }
            });
         })(i);
      }
   };

   swapAllImages();
}

var imageManager = new ImageManagerConstructor;
