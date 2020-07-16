<?php ob_start(); ?>
<div class="container">
    <div class="row mt-5 pt-5">
        <?php foreach ($listPosts as $post): ?>
            <div class="container">
    <div class="row mt-5 pt-5 d-flex flex-column flex-md-row" id="block_chapitres">
        <div class="col col-md-3 text-center text-sm-left">
            <h3> 
                <?= htmlspecialchars($post['title']) ?> 
            </h3>
        </div>
        <div class="col col-md-3 text-center text-sm-left">
            <h5>
                <?= $post['date_creation_fr'] ?> 
            </h5>
        </div>
        <div class="col-md-6 d-none d-md-block text-truncate">
            <?= htmlspecialchars($post['content']) ?>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-4 d-flex justify-content-end">
                    <a href="admin-login?action=gestionChapitres&amp;page=<?= $_GET['page'] ?>&amp;post=<?=$post['id'] ?>" class="btn btn-dark">Voir</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
<?php if ($nbPages > 1): ?>
    <div class="col d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="admin-login?action=gestionChapitres&amp;page=<?= $currentPage - 1 ?>">Previous</a>
            </li>
            <?php for ($page = 1; $page <= $nbPages; $page++): ?>
                <li class="page-item <?= ($currentPage == $page) ? 'active' : '' ?>">
                    <a class="page-link" href="admin-login?action=gestionChapitres&amp;page=<?= $page ?>"><?= $page ?></a>
                </li>
            <?php endfor ?>
            <li class="page-item <?= ($currentPage == $nbPages) ? 'disabled' : '' ?>">
                <a class="page-link" href="admin-login?action=gestionChapitres&amp;page=<?= $currentPage + 1 ?>">Next</a>
            </li>
        </ul>
    </div>
<?php endif ?>
<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php' ?>