<?php ob_start() ?>

<div class="container pt-5 pb-3">
    <div class="row mt-5 text-center">
        <div class="col">
            <h2 class="title-underline">Liste des commentaires signalés</h2>
        </div>
    </div>
</div>

<?php if (empty($listReportComment)): ?>
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col">
                <h3 class="text-success">Aucun commentaires signalés</h3>
            </div>
        </div>
    </div>
<?php endif ?>
    <?php foreach ($listReportComment as $comment): ?>
        <div class="container mt-3" id>
            <div class="row" id="block-comment-post">
                <div class="col mt-3 mb-3" >
                    <p class="comment-infos">
                        <span>Type de signalement : </span><span class="type-report"><?= $comment['type_report'] ?></span><br>
                        <span>Poster le : </span><?= $comment['date_report_fr'] ?><br> 
                        <span>Par : </span><?= $comment['author'] ?><br>
                    </p>
                </div>
            <div class="col col-md-2 mt-3 text-left">
                    <ul>
                        <li class="delete-comment pb-3">
                            <a href="admin-login?action=deleteComment&amp;id=<?= $comment['id'] ?>" class="delete-content" >Supprimer</a>
                        </li>
                        <li class="validate-comment">
                            <a href="admin-login?action=allowComment&amp;id=<?= $comment['id'] ?>" class="validate-comment">Autoriser</a>
                        </li>
                    </ul>
                </div> 
            </div>
            <div class="row">
                <div class="col text-left">
                    <?= $comment['comment'] ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php ?>
<?php if ($nbPages > 1): ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <nav>
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPage === 1) ? "disabled" : "" ?>">
                            <a href="admin-login?dashboard=gestionCommentaires&amp;page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
                        </li>

                    <?php for($page = 1; $page <= $nbPages; $page++): ?>

                        <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>">
                            <a href="admin-login?dashboard=gestionCommentaires&amp;page=<?= $page ?>" class="page-link"><?= $page; ?></a>
                        </li>

                    <?php endfor ?>
                        <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>">
                            <a href="admin-login?dashboard=gestionCommentaires&amp;page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<?php endif ?>

<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php' ?>
