<?php ob_start(); ?>
<div class="container mt-5 pt-5">
    <div class="row mb-3 mb-sm-5">
        <div class="col text-center">
            <h2 class="title-underline">Création de chapitre</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <form action="" method="post">
            <div class="form-group mb-5">
                <label class="font-weight-bold" for="title-create-chapter">Titre :</label>
                <input class="form-control " type="text" name="title-create-chapter">
            </div>
            
            <div class="form-group">
                <label class="font-weight-bold " for="create-chapter">Contenu :</label>
                <textarea class="form-control" id="create-chapter" name="create-chapter" rows="20"></textarea>
            </div>
            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Créer</button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'viewAdmin/templateAdmin.php'; ?>
