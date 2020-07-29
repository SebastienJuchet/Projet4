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
    <div class="container mt-3 mb-3">
        <div class="row">
            <p id="description" class="text-center font-weight-bold">Bienvenue sur mon blog où vous pourrez découvrir mon dernier livre. <br>
            Ce livre je l'écrirai avec vous, je serais à l'écoute de vos commentaires pour le créer et le faire vivre avec vous. <br>
            La totatlité des chapitres seront accessible sur se blog.</p>
        </div>
    </div>
</div>

<?php $slider = ob_get_clean(); ?>
<?php require 'template.php'; ?>
