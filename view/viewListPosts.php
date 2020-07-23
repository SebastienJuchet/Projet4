<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col pt-3">
            <h2 class="mt-5 pt-5 text-center title-underline">Liste des chapitres</h2>
        </div>
    </div>
</div>

<div class="container pt-5 pt-sm-3 d-flex justify-content-center">
    <div class="row d-flex flex-row justify-content-center mt-5 pt-5">
        <?php foreach($listPosts as $post): ?>
            <div class="col-12 col-sm-6 col-lg-3 ml-3 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title pb-3 text-center border-bottom"><?= $post['title'] ?></h5>
                        <div class="card-body" id="card-list-post">
                            <?= $post['content'] ?>
                        </div>
                        <div class="card-footer text-center">
                            <p>Posté le : <?= $post['date_creation_fr'] ?></p>
                            <a class="btn btn-primary" href="index?action=post&amp;id=<?= $post['id'] ?>&amp;pageComment=1">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
    
<?php if ($nbPages > 1): ?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <nav>
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage === 1) ? "disabled" : "" ?>">
                        <a href="index.php?action=listeChapitres&amp;page=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
                    </li>

                <?php for($page = 1; $page <= $nbPages; $page++): ?>

                    <li class="page-item <?= ($currentPage === $page) ? "active" : "" ?>">
                        <a href="index.php?action=listeChapitres&amp;page=<?= $page ?>" class="page-link"><?= $page; ?></a>
                    </li>

                <?php endfor ?>
                <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>">
                        <a href="index.php?action=listeChapitres&amp;page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php endif ?>

<?php $content = ob_get_clean();?>
<?php require 'template.php';
