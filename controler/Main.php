<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

function listPosts() {
    $posts = new PostManager();
    $listPosts = $posts->getPosts();

    require 'view/viewListPosts.php';
}
/**
 * function show post and comments
 *
 * @param [int] $postId id of post
 * @return 
 */
function postComments(int $postId) {
    $postManager = new PostManager();
    $req = $postManager->getPost($postId);

    $post = $req->fetch();
    if ($post) {
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($postId);
    }


    require 'view/viewPostComments.php';
    
}
