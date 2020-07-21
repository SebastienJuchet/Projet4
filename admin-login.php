<?php 
require 'controler/ControlerAdmin.php'; 
session_start();
try {
    if (empty($_GET)) {
        nbComments();
        nbChapters();
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
        nbChapters();
        require 'viewAdmin/viewDashboard.php';
    }

    if (isset($_GET['dashboard']) && $_GET['dashboard'] === 'deconnexion') {
        disconnectAdmin();
    }

    if (isset($_GET['action'])) {
        
        if ($_GET['action'] === 'gestionCommentaires' && $_GET['page'] > 0) {
            managementComments($_GET['page']);
            if (isset($_GET['supprimer']) && $_GET['supprimer'] > 0) {
                delComment($_GET['supprimer']);
            } elseif (isset($_GET['autoriser']) && $_GET['autoriser'] > 0) {
                allowCommentReport($_GET['autoriser']);
            }
        }

        if ($_GET['action'] === 'gestionChapitres') {
            managementPosts();
            if (isset($_GET['chapitre']) && $_GET['chapitre'] === 'listeChapitres' && $_GET['page'] > 0) {
                listPosts($_GET['page']);
            }
            if (isset($_GET['chapitre']) && $_GET['chapitre'] === 'nouveau') {
                require 'viewAdmin/viewCreateChapter.php';
                if (!empty($_POST['title-create-chapter']) && !empty($_POST['create-chapter'])) {
                    createChapter(htmlspecialchars($_POST['title-create-chapter']), $_POST['create-chapter']);
                }
            }
        }
    }

} catch (Exception $exceptionAdmin) {
    require 'view/viewError.php'; 
}
