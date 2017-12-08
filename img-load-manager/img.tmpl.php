<?php 

   $fileName = pathinfo($image, PATHINFO_FILENAME);
   $extension = pathinfo($image, PATHINFO_EXTENSION);

?>

<div class="img-container">
   <div class="img-wrapper">
      <img class="low-res enlarge" src=<?= compress_image($image) ?> alt=<?= $fileName ?> >
      <img class="high-res hidden enlarge" src=<?= $image ?> alt=<?= $fileName ?> >
   </div>
</div>