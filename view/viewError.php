<?php ob_start(); ?>
<div class="container mb-5 mt-5">
    <div class="row ">
        <div class="col text-center mb-3">
            <h1>Erreur : 
                <?php if(isset($exception)) {
                    echo $exception->getMessage();
                } elseif(isset($exceptionAdmin)) {
                    echo $exceptionAdmin->getMessage(); 
                } ?> 
            </h1>
        </div>
    </div>
    <div class="row ">
        <div class="col d-flex justify-content-center">
            <?php 
                if(isset($exception)) {
                    echo '<img src="public/img/error.jpg" alt="erreur tasse renversée">';
                } elseif(isset($exceptionAdmin)) {
                    echo '<img src="public/img/stop.jpg" alt="erreur tasse renversée">';
                } 
            ?> 
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once 'view/template.php'; ?>
