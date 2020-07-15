<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/UserManager.php';


function verifInfoConnexion($pass_admin, $connexion) {

    $error = false;
    if (password_verify($pass_admin, $connexion['pass']) === false || $connexion['username'] === null) {
        $error = true;
    }

    return $error;
}
 
function connexionAdmin(string $username, string $pass_admin) {

    $usermanager = new UserManager;
    $connexion = $usermanager->userConnexion($username)->fetch();
    $error = verifInfoConnexion($pass_admin, $connexion);
    if ($error === false) {
        $_SESSION['admin'] = $_POST['username-admin'];
    } else {
        $_SESSION['error-connexion'] = 'L\'email ou le mot de passe n\'est pas correct';
        header('Location: /P4/admin-login');
        exit;
    }
}

function disconnectAdmin() {
    unset($_SESSION['admin']);
    header('Location: /P4/admin-login');
    exit;
}

function nbComments() {
    $commentManager = new CommentManager();
    $nbComments = $commentManager->countReportComment()->fetchColumn();
    $_SESSION['nb_comments'] = $nbComments;
}

function managementComments(int $currentPage = 1) {
    $commentManager = new CommentManager();
    $listReportComment = $commentManager->listReportComment($currentPage)->fetchAll();
    $nbComments = $commentManager->countReportComment()->fetchColumn();
    $nbPages = ceil($nbComments / CommentManager::DEFAULT_SIZE);
    $_SESSION['nb_comments'] = $nbComments;

    require 'viewAdmin/viewListComments.php';
}

function delComment(int $idComment) {    
    $commentManager = new CommentManager();
    $req = $commentManager->deleteComment($idComment);
    $req = $commentManager->deleteCommentReport($idComment);
}

function allowCommentReport($idComment) {
    $commentManager = new CommentManager;
    $deleteReportTable = $commentManager->deleteTableReport($idComment);
    $updateComment = $commentManager->commentReportAuthorized($idComment);
}
