<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

/**
 * @return void
 */
function listPosts($currentPage) {
    $posts = new PostManager();
    $listPosts = $posts->getPosts($currentPage);
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

function createComments(int $postId, string $author, string $com,int $reportComment) {
    
    if ($author !== "" && $com !== "") {
        $commentManager = new CommentManager();
        $comment = $commentManager->newComment($postId, $author, $com, $reportComment);
        header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
    } else {
        echo 'les champs ne sont pas remplis';
    }
}

function delComment($idComment) {    
    $commentManager = new CommentManager();
    $req = $commentManager->deleteComment($idComment);
}
