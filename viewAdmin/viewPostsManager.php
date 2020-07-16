<?php ob_start(); ?> 
<?php if (!isset($_GET['chapitre'])): ?>
<div class="container mt-5 pt-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
            <h5 class="card-title pt-3 text-center">Les chapitres</h5>
                <img src="public/img/livre.jpg" class="card-img-top border" alt="chapitre">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=gestionChapitres&amp;chapitre=listeChapitres&amp;page=1">Liste de tous les chapitres</a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
            <h5 class="card-title pt-3 text-center">Nouveau</h5>
                <img src="public/img/nouveau-chapitre.jpg" class="card-img-top border" alt="chapitre">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=gestionChapitres&amp;chapitre=nouveau">Créer un nouveau chapitre</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php'; ?>