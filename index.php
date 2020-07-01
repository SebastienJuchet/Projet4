<?php 
require 'controler/Main.php';
session_start();
try {
    if(empty($_GET)) {
        require_once 'view/slider.php';
    } 
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'listeChapitres' && isset($_GET['page']) && $_GET['page'] > 0) {
            listPosts((int) strip_tags($_GET['page']));
        } elseif ($_GET['action'] === 'post' && isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['pageComment']) && $_GET['pageComment'] > 0) {
            showPost((int) $_GET['id'],(int) $_GET['pageComment']);
        } elseif ($_GET['action'] === 'addComment') {
            $postId = $_GET['id'];
            $author = htmlspecialchars($_POST['author']);
            $comment = htmlspecialchars($_POST['comment']);
            $reportComment = false;
            $_SESSION['author'] = $author;
            
            if (!empty($author) && !empty($comment)) {
                createComments($postId, $author, $comment, $reportComment);
            } else {
                throw new Exception('Vous n\'avez pas remplis les champs demandés!!!');
            }           
        }   
    } 
}

catch (Exception $exception) {
    require_once 'view/viewError.php';
}   
