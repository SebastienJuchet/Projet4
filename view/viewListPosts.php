<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col pt-3">
            <h2 class="mt-5 pt-5 text-center title-underline">Liste des chapitres</h2>
        </div>
    </div>
</div>

<?php while($listPost = $listPosts->fetch()): ?>

<div class="container">
    <div class="row d-flex flex-column flex-md-row" id="block_chapitres">
        <div class="col col-md-3 text-center text-sm-left">
            <h3> 
                <?= htmlspecialchars($listPost['title']) ?> 
            </h3>
        </div>
        <div class="col col-md-3 text-center text-sm-left">
            <h5>
                <?= $listPost['date_creation_fr'] ?> 
            </h5>
        </div>
        <div class="col-md-6 d-none d-md-block text-truncate">
            <?= $listPost['content'] ?>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-4 d-flex justify-content-end">
                    <a href="index.php?action=post&amp;id=<?= $listPost['id'] ?>&amp;pageComment=1" class="btn btn-dark">Lire</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

<?php if ($nbPages > 1): ?>
<div class="container">
    <div class="row">
        <div class="col">
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
