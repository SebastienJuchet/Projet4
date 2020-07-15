<?php ob_start() ?>
<div class="container">
    <div class="row mt-5 pt-5">
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="public/img/commentaires.png" class="card-img-top border" alt="commentaires">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=gestionCommentaires&amp;page=1"><?= ($_SESSION['nb_comments'] > 0) ? "Vous avez {$_SESSION['nb_comments']} commentaires signalés" : "Aucun commentaire signalé" ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php' ?>
