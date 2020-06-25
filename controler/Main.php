<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

/**
 * @return void
 */
function listPosts() {
    $posts = new PostManager();
    $listPosts = $posts->getPosts();

    require 'view/viewListPosts.php';
}

/**
 * @param integer $postId
 */
function showPost(int $postId) {
    $postManager = new PostManager();
    $req = $postManager->getPost($postId);

    $post = $req->fetch();

    if ($post) {
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($postId);
    }

    require 'view/viewPostComments.php';
}

function createComments(int $postId, string $author, string $com,int $reportComment) {
    $commentManager = new CommentManager();
    $comment = $commentManager->newComment($postId, $author, $com, $reportComment);

    header('Location: index.php?action=post&id='.$postId );
}

function delComment($idComment) {    

    $commentManager = new CommentManager();
    $req = $commentManager->deleteComment($idComment);

}
