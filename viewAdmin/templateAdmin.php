<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="public/img/livre.svg">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" integrity="sha384-ujbKXb9V3HdK7jcWL6kHL1c+2Lj4MR4Gkjl7UtwpSHg/ClpViddK9TI7yU53frPN" crossorigin="anonymous"></script>  
    <title>Billet simple pour l'Alaska</title>
</head>

<body>
<?php if(isset($_SESSION['admin'])): ?>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand bd-highlight" href="admin-login?dashboard">
                    <i class="fas fa-home"></i>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse bd-highlight" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="admin-login?dashboard">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-login?action=gestionChapitres&amp;page=1">Gestion des chapitres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin-login?action=gestionCommentaires&amp;page=1">Gestion commentaires 
                                <?php if ($_SESSION['nb_comments'] > 0): ?>
                                    <span class="text-white"><?= $_SESSION['nb_comments'] ?></span>
                                <?php endif ?>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="nav justify-content-end pr-5 bg-dark">
                    <span class="navbar-text bd-highlight">Bonjour <?= ucfirst($_SESSION['admin']) ?></span>
                </div>
                <div class="nav justify-content-end bg-dark">
                    <a class="navbar-brand bd-highlight" href="admin-login?dashboard=deconnexion">Deconnexion</a>
                </div>
            </div>
        </nav>
    </header>
    <?php endif ?>
    <?= $formAdminConnexion ?? "" ?>
    <?= !empty($_SESSION['admin']) ? @$content : "" ?>
</body>

</html>
