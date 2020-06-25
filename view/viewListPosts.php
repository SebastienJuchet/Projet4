<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col pt-3">
            <h2 class="mt-5 pt-5 text-center">Liste des chapitres</h2>
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
            <?= htmlspecialchars($listPost['content']) ?>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-4 d-flex justify-content-end">
                    <a href="index.php?action=post&amp;id=<?= $listPost['id'];?>" class="btn btn-dark">Lire</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php endwhile ?>
<?php $content = ob_get_clean();?>
<?php require 'template.php';
