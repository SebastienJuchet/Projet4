<?php 
require 'controler/ControlerAdmin.php'; 
session_start();
try {
    if (empty($_GET)) {
        require_once 'viewAdmin/viewAdminConnexion.php';
    }

    if (!empty($_POST['username-admin']) && !empty($_POST['password-admin'])) {
        connexionAdmin(strip_tags($_POST['username-admin']), strip_tags($_POST['password-admin']));
    }
    
    if (isset($_GET['dashboard']) && empty($_GET['dashboard'])) {
        require 'viewAdmin/viewDashboard.php';
        nbComments();
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
    }

} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage(); 
}
