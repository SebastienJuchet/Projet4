<?php ob_start(); ?>
<div class="container mt-5 pt-5">
    <?php if (isset($_SESSION['error-content-post'])): ?>
        <div class="row mb-3 mb-sm-5 alert alert-danger">
            <div class="col text-center">
                <?= $_SESSION['error-content-post']; unset($_SESSION['error-content-post']); ?>
            </div>
        </div>
    <?php endif ?>
    <div class="row mb-3 mb-sm-5">
        <div class="col text-center">
            <h2 class="title-underline"><?= ($_GET['action'] === 'modifierChapitre') ? 'Modifier le chapitre' : 'Création de chapitre' ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <form action="admin-login?action=<?= ($_GET['action'] === 'modifierChapitre') ? 'chapitreModifier&chapitre=' . $_GET['chapitre'] : 'chapitreCreer' ?>" method="post">
            <div class="form-group mb-5">
                <label class="font-weight-bold" for="title-post">Titre :</label>
                <input class="form-control " type="text" name="title-post" value="<?= ($_GET['action'] === 'modifierChapitre') ? $post['title'] : '' ?>">
            </div>
            
            <div class="form-group">
                <label class="font-weight-bold " for="post-content">Contenu :</label>
                <textarea class="form-control" id="post" name="post-content" rows="20" ><?= ($_GET['action'] === 'modifierChapitre') ? $post['content'] : '' ?></textarea>
            </div>
            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-primary <?= ($_GET['action'] === 'modifierChapitre') ? 'update-post' : '' ?>" type="submit" >
                    <?= ($_GET['action'] === 'modifierChapitre') ? 'Modifier' : 'Créer' ?>
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php'; ?>
