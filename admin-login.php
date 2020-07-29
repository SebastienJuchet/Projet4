<?php 
require 'controler/ControlerAdmin.php'; 
session_start();
try {
    if (empty($_GET)) {
        nbComments();
        nbPosts();
        require_once 'viewAdmin/viewAdminConnexion.php';
    } 
    
    if (empty($_GET) && isset($_SESSION['admin'])) {
        require 'viewAdmin/viewDashboard.php';
    }

    if (isset($_GET['dashboard']) && !isset($_SESSION['admin'])) {
        throw new Exception('<span class="text-danger">403</span> vous n\'êtes pas autorisé à consulter cette page.');
    }

    if (!empty($_POST['username-admin']) && !empty($_POST['password-admin'])) {
        connexionAdmin(strip_tags($_POST['username-admin']), strip_tags($_POST['password-admin']));
    }
    
    if (isset($_GET['dashboard']) && empty($_GET['dashboard'])) {
        nbComments();
        nbPosts();
        require 'viewAdmin/viewDashboard.php';
    }

    if (isset($_GET['dashboard']) && $_GET['dashboard'] === 'deconnexion') {
        disconnectAdmin();
    }

    if (isset($_GET['action'])) {
        
        if ($_GET['action'] === 'gestionCommentaires' && $_GET['page'] > 0) {
            managementComments($_GET['page']);
        } elseif ($_GET['action'] === 'deleteComment' && isset($_GET['id']) && $_GET['id'] > 0) {
            delComment($_GET['id']);
        } elseif ($_GET['action'] === 'allowComment' && isset($_GET['id']) && $_GET['id'] > 0) {
            allowCommentReport($_GET['id']);
        } 
        
        if ($_GET['action'] === 'gestionChapitres') {
            managementPosts();
        } elseif ($_GET['action'] === 'listeChapitres' && $_GET['page'] > 0) {
            listPosts($_GET['page']);
        } elseif ($_GET['action'] === 'creationChapitre') {
            require 'viewAdmin/viewCreateUpdatePost.php';
        } elseif ($_GET['action'] === 'chapitreCreer') {
            createPost(htmlspecialchars($_POST['title-post']), $_POST['post-content']);
        } elseif ($_GET['action'] === 'voirChapitre') {
            if (isset($_GET['chapitre']) && !empty($_GET['chapitre']) && $_GET['chapitre'] > 0) {
                showPostAdmin($_GET['chapitre']);
            }
        } 
        if ($_GET['action'] === 'supprimerChapitre') {
            deletePost($_GET['chapitre']);
        } elseif ($_GET['action'] === 'modifierChapitre') {
            viewEditPost($_GET['chapitre']);
        } elseif ($_GET['action'] === 'chapitreModifier') {
            editPost($_GET['chapitre'], $_POST['title-post'], $_POST['post-content']);
        }
    }

} catch (Exception $exceptionAdmin) {
    require 'view/viewError.php'; 
}
