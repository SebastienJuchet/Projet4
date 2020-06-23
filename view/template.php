<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public\css\style.css">
        <script defer src="public/js/slider.js"></script>
        <script defer src="public/js/apps.js"></script>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" integrity="sha384-ujbKXb9V3HdK7jcWL6kHL1c+2Lj4MR4Gkjl7UtwpSHg/ClpViddK9TI7yU53frPN" crossorigin="anonymous"></script>  
        <title><?php $title; ?></title>
    </head>
    <body>

    <header>
        <nav class="navbar navbar-expand-lg fixed-top mb-3 navbar-dark bg-dark ">
            <div class="container-fluid d-flex justify-content-end">
                <a class="navbar-brand p-2 bd-highlight" href="index.php">
                <i class="fas fa-home"></i> Billet simple pour l'Alaska
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse p-2 bd-highlight" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listeChapitres">Chapitres</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header> 

    <?= $slider ?? "" ?>

    <?= $content ?? '' ?>


    <footer class="d-flex align-items-center bg-dark pt-5 pb-5 text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="list-inline text-center ">
                        <li class="list-inline-item h5"><a href="" class="text-white"> À propos</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item h5"><a href="mentions_legales.html" class="text-white"> Mentions Légales</a></li>
                        <li class="list-inline-item">&middot;</li>
                        <li class="list-inline-item h5">&#0169 Fait par Sébastien Juchet pour OCR</li>
                    </ul>
                </div>
                
            </div>
        </div>
    </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>