<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';
require_once 'model/UserManager.php';

/**
 * @param string $pass_admin
 * @param bool|array $connexion
 * @return boolean
 */
function verifInfoConnexion(string $pass_admin, $connexion): bool {
    $error = false;
    if (password_verify($pass_admin, $connexion['pass']) === false || $connexion['username'] === null) {
        $error = true;
    }

    return $error;
}

/**
 * @param string $username
 * @param string $pass_admin
 */
function connexionAdmin(string $username, string $pass_admin) {

    $usermanager = new UserManager;
    $connexion = $usermanager->userConnexion($username)->fetch();
    $error = verifInfoConnexion($pass_admin, $connexion);
    if ($error === false) {
        $_SESSION['admin'] = $_POST['username-admin'];
        header('Location: admin-login?dashboard');
    } else {
        $_SESSION['error-connexion'] = 'L\'email ou le mot de passe n\'est pas correct';
        header('Location: /P4/admin-login');
        exit;
    }
}

/**
 * destroy session admin
 */
function disconnectAdmin() {
    unset($_SESSION['admin']);
    header('Location: /P4/admin-login');
    exit;
}

/**
 * set the number of comments
 */
function nbComments() {
    $commentManager = new CommentManager();
    $nbComments = $commentManager->countReportComment()->fetchColumn();
    $_SESSION['nb_comments'] = $nbComments;
}

/**
 * set the number of chapters
 */
function nbChapters() {
    $postManager = new PostManager();
    $nbPost = $postManager->postCount()->fetchColumn();
    $_SESSION['nb_chapitre'] = $nbPost;
}

/**
 * create pagination comments
 *
 * @param integer $currentPage
 */
function managementComments(int $currentPage = 1) {
    $commentManager = new CommentManager();
    $listReportComment = $commentManager->listReportComment($currentPage)->fetchAll();
    $nbComments = $commentManager->countReportComment()->fetchColumn();
    $nbPages = ceil($nbComments / CommentManager::DEFAULT_SIZE);
    $_SESSION['nb_comments'] = $nbComments;

    require 'viewAdmin/viewListComments.php';
}

/**
 * @param integer $idComment
 */
function delComment(int $idComment) {    
    $commentManager = new CommentManager();
    $req = $commentManager->deleteComment($idComment);
    $req = $commentManager->deleteCommentReport($idComment);
}

/**
 * @param integer $idComment
 */
function allowCommentReport(int $idComment) {
    $commentManager = new CommentManager;
    $deleteReportTable = $commentManager->deleteTableReport($idComment);
    $updateComment = $commentManager->commentReportAuthorized($idComment);
}

/**
 * function for display viewPostsManager
 */
function managementPosts() {
    require 'viewAdmin/viewPostsManager.php';
}

/**
 * @param integer $currentPage
 */
function listPosts(int $currentPage) {
    $postManager = new PostManager();
    $listPosts = $postManager->getPosts($currentPage)->fetchAll();
    $nbPost = $postManager->postCount()->fetchColumn();
    $nbPages = ceil($nbPost / $postManager::DEFAULT_SIZE);
    
    require 'viewAdmin/viewAdminListPosts.php';
}

/**
 * @param string $title
 * @param string $chapterContent
 */
function createChapter(string $title, string $chapterContent) {
    $postManager = new PostManager;
    $create = $postManager->createPost($title, $chapterContent);

    header('Location: admin-login?dashboard');
}

/**
 * @param integer $postId
 */
function showPostAdmin(int $postId) {
    $postManager = new PostManager;
    $post = $postManager->getPost($postId)->fetch();
    
    require 'viewAdmin/viewPostAdmin.php';
}

/**
 * @param integer $postId
 */
function deletePost(int $postId) {
    $postManager = new PostManager;
    $postDelete = $postManager->deletePost($postId);

    header('Location: admin-login?action=gestionChapitres&chapitre=listeChapitres&page=1');
}

function viewEditPost($postId) {
    $postManager = new PostManager;
    $post = $postManager->getPost($postId)->fetch();

    require 'viewAdmin/viewCreateUpdateChapter.php';
}

function editPost($postId, $title, $content) {

    $postManager = new PostManager;
    if (!empty($_POST['title-chapter']) && !empty($_POST['chapter-content'])) {
        $updatePost = $postManager->updatePost($postId, $title, $content);
        header('Location: admin-login?action=gestionChapitres&chapitre=listeChapitres&page=1');
    }
    
}
