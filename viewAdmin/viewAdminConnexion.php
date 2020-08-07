<?php ob_start() ?>
<?php if(empty($_SESSION['admin'])): ?>
<div id="form-connexion">
    <div class="container" id="form-connexion">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h1>Connexion</h1>
                    </div>
                    <?php if(isset($_SESSION['error-connexion'])): ?>
                        <div class="bg-danger text-white pt-3 pb-3">
                            <?php echo $_SESSION['error-connexion']; unset($_SESSION['error-connexion']); ?>
                        </div>
                    <?php endif ?>
                    <div class="card-body text-left">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username-admin">Identifiant :</label>
                                <input class="form-control" type="text" name="username-admin" required>
                            </div>
                            <div class="form-group">
                                <label for="password-admin">Mot de passe :</label>
                                <input class="form-control" type="password" name="password-admin" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php $formAdminConnexion = ob_get_clean(); ?>
<?php require 'templateAdmin.php'; ?>
