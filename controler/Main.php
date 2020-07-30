<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

/**
 * @param integer $currentPage
 */
function listPosts(int $currentPage) {
    $posts = new PostManager();
    $listPosts = $posts->getPosts($currentPage)->fetchAll();
    $postPage = $posts->postCount()->fetchColumn();

    $nbPages = ceil($postPage / PostManager::DEFAULT_SIZE);
    if ($currentPage > $nbPages) {
        throw new Exception('La page demandé n\'éxiste pas !!!');
    } else {
        require 'view/viewListPosts.php';
    }
}

/**
 * @param integer $postId
 */
function showPost(int $postId,int $currentPage) {
    $postManager = new PostManager();
    $req = $postManager->getPost($postId);

    $post = $req->fetch();

    if ($post) {
        $commentManager = new CommentManager();
        $nbComments = $commentManager->countComments($postId)->fetchColumn();
        $nbPages = ceil($nbComments / CommentManager::DEFAULT_SIZE);

        $comments = $commentManager->getComments($postId, $currentPage);
    }
    
    require 'view/viewPostComments.php';
}

/**
 * @param string $author
 * @param string $com
 * @return boolean
 */
function validateFormComment(string $author, string $com): bool {
    $error = false;
    if (empty($author) || empty($com) || strtolower($author) === 'jean forteroche') {
        $error = true;
    }

    if ($_SESSION['admin'] && !empty($com)) {
        $error = false;
    }

    return $error;
}

/**
 * @param integer $postId
 * @param string $author
 * @param string $com
 * @param integer $reportComment
 * @return void
 */
function createComments(int $postId, string $author, string $com, int $reportComment) {
    $error = validateFormComment($author, $com);
    if ($error === false) {
        $commentManager = new CommentManager();
        $comment = $commentManager->newComment($postId, $author, $com, $reportComment);
        unset($_SESSION['error-comment']);
        header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
    } else {
        $_SESSION['error-comment'] = 'Les champs ne sont pas remplis ou le pseudo est réservé';
        header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
    }
}

/**
 * @param integer $idComment
 * @param string $typeReport
 * @return void
 */
function reportComments(int $idComment, string $typeReport, int $postId) {
    $commentManager = new CommentManager();
    $reportComment = $commentManager->updateReportComment($idComment);

    $reportCommentAdmin = $commentManager->reportComment($idComment, $typeReport);
    header('Location: index.php?action=post&id=' . $postId . '&pageComment=1');
}

class CommenntControler
{
    
}