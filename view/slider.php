<?php ob_start(); ?>

<div id="slider" class="mt-5">
    <div class="slider-inner">
        <div class="slide-item active">
            <img src="public/img/aurore-lac.jpg" alt="...">
        </div>
        <div class="slide-item">
            <img src="public/img/lac.jpg" alt="...">
        </div>
        <div class="slide-item">
            <img src="public/img/montagne-foret.jpg" alt="...">
        </div>
        <div class="slide-item">
            <img src="public/img/montagne-neige.jpg" alt="...">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <p id="description" class="text-center font-weight-bold">Bienvenue sur mon blog où vous pourrez découvrir mon dernier livre. <br>
            Ce livre je l'écrirai avec vous, se serais à l'écoute de vos commentaires pour l'inventer avec vous. <br>
            Tous les chapitres seront accessible sur se blog.</p>
        </div>
    </div>
</div>

<?php $slider = ob_get_clean(); ?>
<?php require 'template.php'; ?>
