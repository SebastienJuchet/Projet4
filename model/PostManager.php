<?php 
require_once 'model/ConnexionDb.php';

class PostManager extends ConnexionDb
{
    /**
     * @var int
     */
    public CONST DEFAULT_SIZE = 10;

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
     * @param integer $postId
     * @return PDOStatement
     */
    public function getPost(int $postId): PDOStatement 
    {
        $request = 'SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y à %hH:%mMin\') AS date_creation_fr FROM post WHERE id = ?';
        return $this->createRequest($request, [$postId]);
    }

    /**
     * @param string $title
     * @param string $chapterContent
     * @return PDOStatement
     */
    public function createPost(string $title, string $chapterContent): PDOStatement
    {
        $request = 'INSERT INTO post (title, content, date_creation) VALUES (:title, :content, NOW())';

        return $this->createRequest($request,[
            ':title' => $title,
            ':content' => $chapterContent
        ]);
    }

    /**
     * @param integer $idPost
     * @return PDOStatement
     */
    public function deletePost(int $idPost): PDOStatement
    {
        $request = 'DELETE FROM post WHERE id = :id';

        return $this->createRequest($request, [
            ':id' => $idPost
        ]);
    }

    /**
     * @param integer $postId
     * @param string $title
     * @param string $content
     * @return PDOStatement
     */
    public function updatePost(int $postId,string $title, string $content):PDOStatement
    {
        $request = 'UPDATE post SET title = :title, content = :content WHERE id = :id';

        return $this->createRequest($request, [
            ':title' => $title,
            ':content' => $content,
            ':id' => $postId
        ]);
    }
}
