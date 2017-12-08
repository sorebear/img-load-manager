class imageManagerClass {
   constructor() {
      this.highResArray = document.getElementsByClassName('high-res');
      this.lowResArray = document.getElementsByClassName('low-res');
      this.init();
   }
   init() {
      this.swapAllImages();
   }

   /**
   * Loops through all the high-res photos and instructs them to become opaque once they've finished loading
   * It also tells both the high-res and low-res images to shrink after the high-res photo has finished loading
   */
   swapAllImages() {
      const self = this;
      for (var i = 0; i <this.highResArray.length; i++) {
         (function(i) {
            setTimeout(function() {
               if (self.highResArray[i].complete) {
                  self.highResArray[i].classList.remove("hidden", "enlarge");
                  self.lowResArray[i].classList.remove("enlarge");
               } else {
                  self.highResArray[i].onload = function() {
                     self.highResArray[i].classList.remove("hidden", "enlarge");
                     self.lowResArray[i].classList.remove("enlarge");
                  }
               }
            });
         })(i);
      }
   }  
}

const imageManager = new imageManagerClass;