<?php ob_start() ?>
<div class="container pt-5 pt-sm-3 d-flex justify-content-center">
    <div class="row mt-5 pt-5">
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <img src="public/img/commentaires.png" class="card-img-top border" alt="commentaires">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=gestionCommentaires&amp;page=1"><?= ($_SESSION['nb_comments'] > 0) ? "{$_SESSION['nb_comments']} commentaires signalés" : "Aucun commentaire signalé" ?></a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <img src="public/img/chapitre.jpg" class="card-img-top border" alt="chapitre">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=gestionChapitres&amp;chapitre=listeChapitres&amp;page=1">
                        <?php if ($_SESSION['nb_chapitre'] == 1) {
                            echo "Vous avez {$_SESSION['nb_chapitre']} chapitre en ligne";
                        } elseif ($_SESSION['nb_chapitre'] > 1) {
                            echo "Vous avez {$_SESSION['nb_chapitre']} chapitres en ligne";
                        } else {
                            echo "Aucun chapitre en ligne";
                        } ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
                <img src="public/img/nouveau-chapitre.jpg" class="card-img-top border" alt="chapitre">
                <div class="card-body text-center">
                    <a class="btn btn-primary" href="admin-login?action=creationChapitre">Créer un nouveau chapitre</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php' ?>
