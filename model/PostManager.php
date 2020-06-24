<?php 
require_once 'model/ConnexionDb.php';

class PostManager extends ConnexionDb
{
    /**
     * Function display list posts
     *
     * @return request
     */
    public function getPosts()
    {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post ORDER BY date_creation DESC';
        return $this->createRequest($request);
        
    }

    /**
     * Function for display one post
     *
     * @param [int] $postId 
     * @return request
     */
    public function getPost($postId) {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post WHERE id = ?';
        return $this->createRequest($request, [$postId]);
    }
}