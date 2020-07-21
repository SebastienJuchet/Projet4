<?php ob_start(); ?>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col pt-3 pb-3 text-center">
            <h2 class="title_post title-underline">
                <?= $post['title'] ?>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col pt-3 border border-dark">
            <?= $post['content'] ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col">
            <a href="admin-login?action=modifierChapitre&amp;chapitre=<?= $_GET['chapitre'] ?>" class="btn btn-primary text-light">Modifier le chapitre</a>
            <a href="admin-login?action=supprimerChapitre&amp;chapitre=<?= $_GET['chapitre'] ?>" class="btn btn-primary text-light" onclick="return deleteContent()">Supprimer le chapitre</a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean() ?>
<?php require 'viewAdmin/templateAdmin.php'; ?>
