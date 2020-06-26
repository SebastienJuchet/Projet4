<?php ob_start(); ?>

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
    </div>
</div>

<?php while ($comment = $comments->fetch()): ?>
<div class="container mt-3" id>
    <div class="row" id="block-comment-post">
        <div class="col mt-3 mb-3" >
            <?= $comment['author'] ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="text-left"><?= $comment['comment'] ?></p>
        </div>
    </div>
</div>
<?php endwhile; ?>

<div class="container mb-3 mt-3" id="separate-form">
    <div class="row mt-3">
        <div class="col-6">
            <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="author">Votre pseudo</label>
                    <input id="author" name="author" type="text" class="form-control" value="<?= @$_SESSION['author'];?>" >
                </div>
                
                <div class="form-group">
                    <label for="comment" id="comment" class="primary">Votre commentaire</label>
                    <textarea name="comment" class="form-control" rows="3" ></textarea>
                </div>
                
                <button id="submit" type="submit" class="btn btn-dark">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require 'template.php'; ?>
