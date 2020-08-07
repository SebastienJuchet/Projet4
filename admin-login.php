<?php 
require 'controller/AdminController.php'; 
session_start();
$adminController = new AdminController;

try {
    if (empty($_GET)) {
        $adminController->nbComments();
        $adminController->nbPosts();
        require_once 'viewAdmin/viewAdminConnexion.php';
    } 
    
    if (empty($_GET) && isset($_SESSION['admin'])) {
        require 'viewAdmin/viewDashboard.php';
    }

    if (isset($_GET['action']) || isset($_GET['dashboard']) && !isset($_SESSION['admin'])) {
        throw new Exception('<span class="text-danger">403</span> vous n\'êtes pas autorisé à consulter cette page.');
    }

    if (!empty($_POST['username-admin']) && !empty($_POST['password-admin'])) {
        $adminController->connexionAdmin();
    }
    
    if (isset($_GET['dashboard']) && empty($_GET['dashboard'])) {
        $adminController->nbComments();
        $adminController->nbPosts();
        require 'viewAdmin/viewDashboard.php';
    } 

    if (isset($_GET['dashboard']) && $_GET['dashboard'] === 'deconnexion') {
        $adminController->disconnectAdmin();
    }

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
    
            case 'gestionCommentaires';
                $adminController->managementComments();
            break;
    
            case 'deleteComment';
                $adminController->delComment();
            break;
    
            case 'allowComment';
                $adminController->allowCommentReport();
            break;
    
            case 'gestionChapitres';
                $adminController->nbPosts();
                require 'viewAdmin/viewPostsManager.php';
            break;
    
            case 'listeChapitres';
                $adminController->listPosts();
            break;
    
            case 'voirChapitre';
                $adminController->showPost();
            break;
    
            case 'modifierChapitre';
                $adminController->viewEditPost();
            break;
    
            case 'creationChapitre';
                require 'viewAdmin/viewCreateUpdatePost.php';
            break;
    
            case 'chapitreCreer';
                $adminController->createPost();
            break;
    
            case 'modifierChapitre';
                $adminController->viewEditPost();
            break;
    
            case 'chapitreModifier';
                $adminController->editPost();
            break;
    
            case 'supprimerChapitre';
                $adminController->delPost();
            break;
    
            default:
                throw new Exception('La page demandée n\'existe pas !!!');
        }
    }

} catch (Exception $exceptionAdmin) {
    require 'view/viewError.php'; 
}
