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
