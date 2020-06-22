<?php
require_once 'model/PostManager.php';

function listPosts() {
    $postManager = new PostManager();
    $listPosts = $postManager->getPosts();

    require 'view/viewListPosts.php';
}