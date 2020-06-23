<?php
require_once 'model/PostManager.php';

function listPosts() {
    $posts = new PostManager();
    $listPosts = $posts->getPosts();

    require 'view/viewListPosts.php';
}

function postComments($postId) {
    $posts = new PostManager();
    $postId = $posts->getPost($postId);

    $post = $postId->fetch();

    require 'view/viewPostComments.php';
}