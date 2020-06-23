<?php ob_start(); ?>
<?php  ?>

<div class="container mt-5 pt-5 text-center">
    <div class="row">
        <div class="col-12 pt-3 text-left">
            <a href="index.php?action=listeChapitres" class="return">Retour à la liste des chapitres</a>
        </div>
    </div>
    <div class="row">
        <div class="col pt-3 pb-3">
            <h2>
                <?= strtoupper(htmlspecialchars($post['title'])); ?>
            </h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <h6>
                <?= $post['date_creation_fr'] ?>
            </h6>
        </div>
    </div>
        
        <div class="col pt-3 pb-3 text-left" id="post-content">
            <?= htmlspecialchars($post['content']) ?>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-end">
                
            </div>
        </div>
        
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require 'template.php';