<?php ob_start(); ?>
<div class="container mt-5 pt-5">
    <div class="row mb-3 mb-sm-5">
        <div class="col text-center">
            <h2 class="title-underline"><?= ($_GET['action'] === 'modifierChapitre') ? 'Modifier le chapitre' : 'Création de chapitre' ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <form action="admin-login?action=<?= ($_GET['action'] === 'modifierChapitre') ? 'chapitreModifier&chapitre=' . $_GET['chapitre'] : 'chapitreCreer' ?>" method="post">
            <div class="form-group mb-5">
                <label class="font-weight-bold" for="title-chapter">Titre :</label>
                <input class="form-control " type="text" name="title-chapter" value="<?= ($_GET['action'] === 'modifierChapitre') ? $post['title'] : '' ?>">
            </div>
            
            <div class="form-group">
                <label class="font-weight-bold " for="create-chapter">Contenu :</label>
                <textarea class="form-control" id="chapter" name="chapter-content" rows="20" ><?= ($_GET['action'] === 'modifierChapitre') ? $post['content'] : '' ?></textarea>
            </div>
            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit" <?= ($_GET['action'] === 'modifierChapitre') ? 'onclick="return validateUpdateChapter()"' : '' ?>>
                    <?= ($_GET['action'] === 'modifierChapitre') ? 'Modifier' : 'Créer' ?>
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php'; ?>
