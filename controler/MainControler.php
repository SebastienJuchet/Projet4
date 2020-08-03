<?php
require_once 'model/PostManager.php';
require_once 'model/CommentManager.php';

class MainControler
{

    public function __construct()
    {
        $this->postManager = new PostManager;
        $this->commentManager = new CommentManager;
    }

    /**
     * function for display list of posts
     */
    public function listPosts()
    {
        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $currentPage = strip_tags((int) $_GET['page']);
        } else {
            header('Location: index');
        }
        $listPosts = $this->postManager->getPosts($currentPage)->fetchAll();
        $postPage = $this->postManager->postCount()->fetchColumn();

        $nbPages = ceil($postPage / PostManager::DEFAULT_SIZE);
        if ($currentPage > $nbPages) {
            throw new Exception('La page demandé n\'éxiste pas !!!');
        } else {
            require 'view/viewListPosts.php';
        }
    }

    /**
     * function for display show and comment
     */
    public function showPost()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['pageComment']) && $_GET['pageComment'] > 0) {
            $postId = (int) $_GET['id'];
            $currentPage = (int) $_GET['pageComment'];
        } else {
            header('Location: index?action=listeChapitres&page=1');
        }
        $post = $this->postManager->getPost($postId)->fetch();

        $nbComments = $this->commentManager->countComments($postId)->fetchColumn();
        $nbPages = ceil($nbComments / CommentManager::DEFAULT_SIZE);

        $comments = $this->commentManager->getComments($postId, $currentPage);
        
        require 'view/viewPostComments.php';
    }

    /**
     * @param string $author
     * @param string $com
     * @return boolean
     */
    private function validateFormComment(string $author, string $comment): bool {
        $error = false;
        if (empty($author) || empty($comment) || strtolower($author) === 'jean forteroche') {
            $error = true;
        }

        if ($_SESSION['admin'] && !empty($comment)) {
            $error = false;
        }

        return $error;
    }

    /**
     * function for add new comment for data base
     */
    public function CeateComments()
    {
        $postId = (int) $_GET['id'];
        $author = (string) htmlspecialchars($_POST['author']);
        $comment = (string) htmlspecialchars($_POST['comment']);
        $reportComment = (bool) false;
        $_SESSION['author'] = $author;

        $error = $this->validateFormComment($author, $comment);
        if ($error === false) {
            $comment = $this->commentManager->newComment($postId, $author, $comment, $reportComment);
            unset($_SESSION['error-comment']);
            header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
        } else {
            $_SESSION['error-comment'] = 'Les champs ne sont pas remplis ou le pseudo est réservé';
            header('Location: index.php?action=post&id=' . $postId . '&pageComment=1' );
        }
    }

    /**
     * function for reported comment 
     */
    public function reportComments() 
    {        
        $idComment = strip_tags($_GET['idMessage']);
        $typeReport = strip_tags($_POST['signalement']);
        $postId = strip_tags($_GET['idPost']);

        $reportComment = $this->commentManager->updateReportComment($idComment);
    
        $reportCommentAdmin = $this->commentManager->reportComment($idComment, $typeReport);
        header('Location: index.php?action=post&id=' . $postId . '&pageComment=1');
    }
}