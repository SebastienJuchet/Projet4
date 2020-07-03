<?php require 'controler/ControlerAdmin.php'; 

try {
    if (empty($_GET)) {
        require 'view/viewAdmin.php';
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage(); 
}
