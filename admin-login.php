<?php require 'controler/ControlerAdmin.php'; 
session_start();
try {
    if (empty($_GET)) {
        require_once 'viewAdmin/viewAdminConnexion.php';
    }

    if (!empty($_POST['username-admin']) && !empty($_POST['password-admin'])) {
        connexionAdmin(strip_tags($_POST['username-admin']), strip_tags($_POST['password-admin']));
    } 

    if (isset($_GET['dashboard'])) {
        require 'viewAdmin/viewDashboard.php';
        if ($_GET['dashboard'] === 'deconnexion') {
            disconnectAdmin();
        }
    }
    
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage(); 
}
