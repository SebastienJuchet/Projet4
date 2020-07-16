<?php 
require_once 'model/ConnexionDb.php';

class PostManager extends ConnexionDb
{
    /**
     * @var int
     */
    public CONST DEFAULT_SIZE = 5;

    /**
     * function pdo query
     * @return PDOStatement
     */
    public function getPosts($currentPage): PDOStatement
    {
        $first = ($currentPage * self::DEFAULT_SIZE) - self::DEFAULT_SIZE;
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post ORDER BY date_creation DESC LIMIT '. $first . ', ' . self::DEFAULT_SIZE;

        return $this->createRequest($request);
    }

    /**
     * @return PDOStatement
     */
    public function postCount():PDOStatement 
    {
        $request = 'SELECT COUNT(*) FROM post';
        return $this->createRequest($request);
    }

    /**
     * function pdo prepare
     * @param integer $postId
     * @return PDOStatement
     */
    public function getPost(int $postId): PDOStatement 
    {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post WHERE id = ?';
        return $this->createRequest($request, [$postId]);
    }
}
