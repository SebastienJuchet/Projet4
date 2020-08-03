<?php
class PostControler
{
    public function listPosts(int $currentPage)
    {
        if (isset($_GET['page']) && $_GET['page'] > 0) {
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
    }

    public function showPost(int $postId)
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager();
            $req = $postManager->getPost($postId);

            $post = $req->fetch();

            return $post;
        }
    }
}