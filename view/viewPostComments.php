<?php ob_start(); ?>

<div class="container mt-5 pt-5 text-center">
    <div class="row d-flex justify-content-between">
        <div class="col-auto pt-3 text-left">
            <a href="index.php?action=listeChapitres&amp;page=1" class="return">Retour à la liste des chapitres</a>
        </div>
    </div>
    <div class="row">
        <div class="col pt-3 pb-3">
            <h2 class="title_post title-underline">
                <?= $post['title'] ?>
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
            <?= $post['content'] ?>
        </div>        
    </div>
</div>
<?php foreach ($comments as $comment): ?>
<div class="container mt-3" id>
    <div class="row d-flex justify-content-around" id="block-comment-post">
        <div class="col mt-3 mb-3" >
           <p class="comment-infos"><span>Poster le : </span><?= $comment['creation_date_fr'] ?><br> 
           <span>Par : </span><?= ($comment['author'] === 'Jean Forteroche') ? '<span class="text-danger">' . $comment['author'] . '</span>' : $comment['author'] ?></p>
        </div>
        <div class="col mt-3 mb-3 text-right">
            <?php if ($comment['report_comment'] == 1) {
                echo "Message signalé";
            }  elseif ($comment['report_comment'] == 2) {
                echo 'Message autoriser par l\'administateur';
            } else {
                echo '';
            } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-11 text-left">
            <?= $comment['comment'] ?>
        </div>
        <div class="col-1 text-center">
            <button id="btn-report" class="btn btn-dark mt-3 mt-sm-0" 
            <?php if ($comment['report_comment'] == 1 || $comment['report_comment'] == 2) {
                echo 'disabled';
            } else {
                echo '';
            } ?>
             data-toggle="modal" data-target="#modalForm<?= $comment['id'] ?>">
                <span>&hellip;</span>
                <span class="report"><?= ($comment['report_comment'] == 0) ? "Signaler" : "" ?></span>
            </button>
        </div> 
    </div>
</div>
<div class="modal" id="modalForm<?= $comment['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Signaler le message :</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <form id="modalForm" action="index.php?action=reportComment&amp;idMessage=<?= $comment['id'] ?>&amp;idPost=<?= $_GET['id'] ?>" method="post">
                    <label for="signalement">Motif</label>
                    <select class="custom-select custom-select-sm" name="signalement">dqsd
                        <option value="violent">Violent</option>
                        <option value="haineux">Discours haineux</option>
                        <option value="sexiste">Sexiste</option>
                        <option value="contenu indesirable">Contenu indesirable</option>
                        <option value="autre">Autre chose</option>
                    </select>
                    <div class="row mt-5">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Signaler</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php if ($nbPages > 1): ?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="index.php?action=post&amp;id=<?= $_GET['id'] ?>&amp;pageComment=<?= $currentPage - 1 ?>" class="page-link">Précédent</a>
                    </li>

                <?php for($page = 1; $page <= $nbPages; $page++): ?>

                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="index.php?action=post&amp;id=<?= $_GET['id'] ?>&amp;pageComment=<?= $page ?>" class="page-link"><?= $page; ?></a>
                    </li>

                <?php endfor ?>
                    <li class="page-item <?= ($currentPage == $nbPages) ? "disabled" : "" ?>">
                        <a href="index.php?action=post&amp;id=<?= $_GET['id'] ?>&amp;pageComment=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?php endif ?>

<div class="container mb-3 mt-3" id="separate-form">
    <div class="row mt-3">
        <div class="col-10 col-sm-6">
            <form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>" method="POST">
                <?php if(isset($_SESSION['error-comment'])): ?>
                    <div class="bg-danger text-white pt-3 pb-3 pl-3 rounded text-center">
                        <?php echo $_SESSION['error-comment']; unset($_SESSION['error-comment']); ?>
                    </div>
                <?php endif ?>
                <div class="form-group">
                    <label for="author" id="author">Votre pseudo :</label>
                    <input name="author" type="text" class="form-control" value="<?php if (!empty($_SESSION['admin'])) {
                                                                                            echo ucfirst($_SESSION['admin']) . ' Forteroche';
                                                                                        } elseif (!empty($_SESSION['author'])) {
                                                                                            echo ucfirst($_SESSION['author']);
                                                                                        } else {
                                                                                            echo '';
                                                                                        }
                                                                                ?>" 
                                                                                <?= (!empty($_SESSION['admin'])) ? 'readonly' : '' ?> >
                </div>
                <div class="form-group">
                    <label for="comment" id="comment" class="primary">Votre commentaire :</label>
                    <textarea name="comment" class="form-control" rows="3" ></textarea>
                </div>
                
                <button id="submit" type="submit" class="btn btn-dark">Envoyer</button>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean();?>
<?php require 'template.php'; ?>
