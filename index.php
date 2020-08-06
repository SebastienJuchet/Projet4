<?php 
require 'controller/MainController.php';
session_start();

$mainControler = new MainControler;
$action = '';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    require_once 'view/slider.php';
}

try {
    switch ($action) {
        case 'listeChapitres';
            $mainControler->listPosts();
        break;
        
        case 'post';
            $mainControler->showPost();
        break;
        
        case 'addComment';
            $mainControler->CeateComments();
        break;

        case 'reportComment';
            $mainControler->reportComments();
        break;

        default;
            throw new Exception('<span class="text-danger">404 </span>l\'action n\'existe pas');
    }
}

catch (Exception $exception) {
    require_once 'view/viewError.php';
}   