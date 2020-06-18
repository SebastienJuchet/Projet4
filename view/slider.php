<?php ob_start(); ?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="public/img/auror-lac.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/img/lac.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/img/montagne-foret.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="public/img/montagne-neige.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<?php
$slider = ob_get_clean();
require ('template.php');
?>