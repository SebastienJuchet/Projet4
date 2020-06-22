<?php ob_start(); ?>

<h1 class="mt-5 pt-5 text-center">Liste des chapitres</h1>
<?php while($postsList = $listPosts->fetch()): ?>
<div class="container">
    <div class="row block_chapitres">
        <div class="col-3">
            <h3><?= $postsList['title'] ?></h3>
        </div>
        <div class="col-3">
            <h5><?= $postsList['date_creation_fr'] ?></h5>
        </div>
        <div class="col-6 text-truncate">
            <?= $postsList['content'] ?>
        </div>
    </div>
</div>
<?php endwhile ?>
<?php $content = ob_get_clean();?>
<?php require 'template.php';

