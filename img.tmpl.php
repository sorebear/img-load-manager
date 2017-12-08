<?php 

   $fileName = pathinfo($image, PATHINFO_FILENAME);
   $extension = pathinfo($image, PATHINFO_EXTENSION);

?>

<div class="img-load-mgr-container">
   <div class="img-load-mgr__img-wrapper">
      <img class="img-load-mgr__low-res img-load-mgr__enlarge" src=<?= compress_image($image) ?> alt=<?= $fileName ?> >
      <img class="img-load-mgr__high-res img-load-mgr__hidden img-load-mgr__enlarge" src=<?= $image ?> alt=<?= $fileName ?> >
   </div>
</div>