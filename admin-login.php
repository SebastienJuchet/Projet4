<?php 
require 'controler/ControlerAdmin.php'; 
session_start();
try {
    if (empty($_GET)) {
        nbComments();
        nbChapters();
        require_once 'viewAdmin/viewAdminConnexion.php';
    }

    if (!empty($_GET) && !isset($_SESSION['admin'])) {
        throw new Exception('<span class="text-danger">403</span> vous n\'êtes pas autorisé à consulter cette page.');
    }

    if (!empty($_POST['username-admin']) && !empty($_POST['password-admin'])) {
        connexionAdmin(strip_tags($_POST['username-admin']), strip_tags($_POST['password-admin']));
    }
    
    if (isset($_GET['dashboard']) && empty($_GET['dashboard'])) {
        nbComments();
        nbChapters();
        require 'viewAdmin/viewDashboard.php';
    }

    if (isset($_GET['dashboard']) && $_GET['dashboard'] === 'deconnexion') {
        disconnectAdmin();
    }

    if (isset($_GET['action'])) {
        
        if ($_GET['action'] === 'gestionCommentaires' && $_GET['page'] > 0) {
            managementComments($_GET['page']);
        }

        if ($_GET['action'] === 'gestionCommentaires' && $_GET['page'] > 0 && isset($_GET['supprimer']) && $_GET['supprimer'] > 0) {
            delComment($_GET['supprimer']);
        }

        if ($_GET['action'] === 'gestionCommentaires' && $_GET['page'] > 0 && isset($_GET['autoriser']) && $_GET['autoriser'] > 0) {
            allowCommentReport($_GET['autoriser']);
        }

        if ($_GET['action'] === 'gestionChapitres') {
            managementPosts();
        }

        if ($_GET['action'] === 'gestionChapitres' && isset($_GET['chapitre']) && $_GET['chapitre'] === 'listeChapitres' && $_GET['page'] > 0) {
            listPosts($_GET['page']);
        }
    }

} catch (Exception $exceptionAdmin) {
    require 'view/viewError.php'; 
}
