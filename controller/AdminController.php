<?php

require 'model/PostManager.php';
require 'model/CommentManager.php';
require 'model/UserManager.php';

class AdminController
{
    public function __construct()
    {
        $this->postManager = new PostManager;
        $this->commentManager = new CommentManager;
        $this->userManager = new UserManager;
    }

    /**
     * @param string $pass_admin
     * @param bool|array $connexion
     * @return boolean
     */
    private function verifInfoConnexion(string $pass_admin, $connexion): bool 
    {
        $error = false;
        if (password_verify($pass_admin, $connexion['pass']) === false || $connexion['username'] === null) {
            $error = true;
        }

        return $error;
    }

    /**
     * @param string $username
     * @param string $pass_admin
     */
    public function connexionAdmin() 
    {
        $username = strip_tags($_POST['username-admin']);
        $pass_admin = strip_tags($_POST['password-admin']);

        $connexion = $this->userManager->userConnexion($username)->fetch();
        $error = $this->verifInfoConnexion($pass_admin, $connexion);
        
        if ($error === false) {
            $_SESSION['admin'] = $_POST['username-admin'];
            header('Location: admin-login?dashboard');
        } else {
            $_SESSION['error-connexion'] = 'L\'email ou le mot de passe n\'est pas correct';
            header('Location: admin-login');
            exit;
        }
    }

    /**
     * destroy session admin
     */
    public function disconnectAdmin() 
    {
        unset($_SESSION['admin']);
        header('Location: admin-login');
        exit;
    }

    /**
     * function to have the number of comments
     */
    public function nbComments() 
    {
        $nbComments = $this->commentManager->countReportComment()->fetchColumn();
        $_SESSION['nb_comments'] = $nbComments;
    }

    /**
     * function to have the number of posts
     */
    public function nbPosts() 
    {
        $nbPosts = $this->postManager->countPosts()->fetchColumn();
        $_SESSION['nb_posts'] = $nbPosts;
    }

    /**
     * display list of comment and create pagination comments
     *
     * @param integer $currentPage
     */
    public function managementComments()
    {
        $currentPage = $_GET['page'];

        $commentManager = new CommentManager();
        $listReportComment = $this->commentManager->listReportComment($currentPage)->fetchAll();
        $nbComments = $this->commentManager->countReportComment()->fetchColumn();
        $nbPages = ceil($nbComments / CommentManager::DEFAULT_SIZE);
        $_SESSION['nb_comments'] = $nbComments;

        require 'viewAdmin/viewListComments.php';
    }

    /**
     * function to delete comment
     */
    public function delComment() 
    {
        $id = $_GET['id'];
        $this->commentManager->deleteComment($id);
        $this->commentManager->deleteCommentReport($id);

        header('Location: admin-login?action=gestionCommentaires&page=1');
    }

    /**
     * function to allow comment report
     */
    public function allowCommentReport()
    {
       
        if ($_GET['id'] > 0) {
             $id = (int) $_GET['id'];
        } else {
            throw new Exception('Le commentaire que vous voulez supprimer n\'éxiste pas !!!');
        }

        $this->commentManager->commentReportAuthorized($id);
        $this->commentManager->deleteCommentReport($id);

        header('Location: admin-login?action=gestionCommentaires&page=1');
    }

    /**
     * function to display list of posts
     */
    public function listPosts()
    {
        $currentPage = (int) $_GET['page'];

        $listPosts = $this->postManager->getPosts($currentPage);
        $nbPosts = $this->postManager->countPosts()->fetchColumn();
        $nbPages = ceil($nbPosts / PostManager::DEFAULT_SIZE);

        require 'viewAdmin/viewAdminListPosts.php';
    }

    /**
     * function to display post
     */
    public function showPost()
    {   
        if (isset($_GET['chapitre']) && $_GET['chapitre'] > 0) {
            $id = (int) $_GET['chapitre'];
        } else {
            throw new Exception('Le chapitre que vous voulez voir n\'éxiste pas ou à était supprimer');
        }

        $post = $this->postManager->getPost($id)->fetch();
        
        require 'viewAdmin/viewPostAdmin.php';
    }

    /**
     * function for display wysiwyg
     */
    public function viewEditPost()
    {
        $id = (int) $_GET['chapitre'];

        $post = $this->postManager->getPost($id)->fetch();
        require 'viewAdmin/viewCreateUpdatePost.php';
    }

    /**
     * function for create new post
     */
    public function createPost()
    {
        if (!empty($_POST['title-post']) && !empty($_POST['post-content'])) {
            $title = htmlspecialchars($_POST['title-post']);
            $content = $_POST['post-content'];
            $this->postManager->createPost($title, $content);
            header('Location: admin-login?action=gestionChapitres');
        } else {
            $_SESSION['error-content-post'] = 'Veuillez remplir tous les champs';
            header('Location: admin-login?action=creationChapitre');
        }
    }

    /**
     * function to edit a post
     */
    public function editPost()
    {
        if (!empty($_POST['title-post']) && !empty($_POST['post-content'])) {
            $id = $_GET['chapitre'];
            $title = $_POST['title-post'];
            $content = $_POST['post-content'];
            $this->postManager->updatePost($id, $title, $content);

            header('Location: admin-login?action=listeChapitres&page=1');
        } else {
            $_SESSION['error-content-post'] = 'Veuillez remplir tous les champs';
            header('Location: admin-login?action=modifierChapitre&chapitre=' . $_GET['chapitre'] );
        }
    }

    /**
     * function to delete post
     */
    public function delPost()
    {
        $id = (int) $_GET['chapitre'];
        $this->postManager->deletePost($id);

        header('Location: admin-login?action=listeChapitres&page=1');
    }
}
