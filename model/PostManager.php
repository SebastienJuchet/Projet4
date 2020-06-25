<?php 
require_once 'model/ConnexionDb.php';

class PostManager extends ConnexionDb
{
    /**
     * function pdo query
     * @return PDOStatement
     */
    public function getPosts(): PDOStatement
    {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post ORDER BY date_creation DESC';
        return $this->createRequest($request);
    }

    /**
     * function pdo prepare
     * @param integer $postId
     * @return PDOStatement
     */
    public function getPost(int $postId): PDOStatement {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post WHERE id = ?';
        return $this->createRequest($request, [$postId]);
    }
}
