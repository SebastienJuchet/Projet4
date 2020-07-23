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
    require 'view/viewListPosts.php';    
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
 * @param integer $postId
 * @param string $author
 * @param string $com
 * @param integer $reportComment
 * @return void
 */
function createComments(int $postId, string $author, string $com,int $reportComment) {
    
    if ($author !== "" && $com !== "") {
        $commentManager = new CommentManager();
        $comment = $commentManager->newComment($postId, $author, $com, $reportComment);
        header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
    } else {
        echo 'les champs ne sont pas remplis';
    }
}

/**
 * @param integer $idComment
 * @param string $typeReport
 * @return void
 */
function reportComments(int $idComment, string $typeReport) {
    $commentManager = new CommentManager();
    $reportComment = $commentManager->updateReportComment($idComment);

    $reportCommentAdmin = $commentManager->reportComment($idComment, $typeReport);
    header('Location: index.php?action=listeChapitres&page=1');
}
