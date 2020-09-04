<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="shortcut icon" href="public/img/livre.svg">
        <script defer src="public/js/slider.js"></script>
        <script defer src="public/js/apps.js"></script>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" integrity="sha384-ujbKXb9V3HdK7jcWL6kHL1c+2Lj4MR4Gkjl7UtwpSHg/ClpViddK9TI7yU53frPN" crossorigin="anonymous"></script>  
        <title>Billet simple pour l'Alaska</title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <div class="container-fluid d-flex justify-content-end">
           
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse p-2 bd-highlight" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php if (isset($_SESSION['admin'])): ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="admin-login?dashboard">Retour au tableau de bord</a>
                            </li>
                        <?php endif ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listeChapitres&amp;page=1">Chapitres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#foo" data-toggle="modal" data-target="#staticBackdrop"> À propos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> 
    <?php if (isset($slider) && $slider !== ''): ?>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col text-center">
                    <h1 class="mb-3">Jean Forteroche vous présente:</h1>
                    <h2 class="title-underline">"Billet simple pour l'Alaska"</h2>
                </div>
            </div>
        </div>        
    <?php endif; ?>

    <?= $slider ?? "" ?>

    <?= $content ?? "" ?>

    <footer class="sticky-bottom d-flex align-items-center bg-dark pt-5 pb-5 text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="list-inline text-center ">
                        <li class="list-inline-item h5"><a href="#foo" class="text-white" data-toggle="modal" data-target="#staticBackdrop"> À propos</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item h5"><a href="mentions_legales.php" class="text-white"> Mentions Légales</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item h5">&#0169 Fait par Sébastien Juchet pour OCR</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="staticBackdrop" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row d-flex justify-content-center mt-3">
                        <div id="image-modal" >
                            <img src="public/img/statue-forteroche.jpg" alt="statue-forteroche">
                        </div>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Jean Forteroche</h4>
                </div>
            <div class="modal-body">
                <p>Jean Forteroche né le : 02 mai 1968 à Château-Briant est un écrivain de très grande renomée française.<br>
                Pationné d'écriture depuis le plus jeune âge, il écrit son premier livre à l'âge de 15 ans. <br>
                Il fît ses études à Dijon dans l'université de Bourgogne où il obtient son master 2 Métier du Livre en 1987.<br> 
                Connus par la suite pour ses romans policiers et romans à suspense tel que :</p>
                <ol>
                    <li>Un corp retouvé sous le pont de la seine</li>
                    <li>La ligne Rouge</li>
                    <li>Qui a tué Léonard ...</li>
                    <li>13 jours de nuits</li>
                    <li>ect ...</li>
                </ol>
                <p>C'est avec joie qu'il vous présente son tout nouveau concept. <br>
                Pour çà il vous met vous, chères lecteurs, à contributions grâce au système de commentaires. <br>
                Il créera avec vous l'histoire d'une famille qui décide de quitter son pays natal pour vivre son rêve de l'autre côté de l'Atlantique.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
    </body>
</html>
