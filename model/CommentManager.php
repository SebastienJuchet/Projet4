<?php
require_once 'model/ConnexionDb.php';

class CommentManager extends ConnexionDb 
{
    /**
     * @param integer $postId
     * @return PDOStatement
     */
    public function getComments(int $postId): PDOStatement {
        $request = 'SELECT id_post, author, comment, report_comment, DATE_FORMAT(creation_date, \'%d-%m-%Y à %hH:%mMin\') AS creation_date_fr FROM comments WHERE id_post=? ORDER BY creation_date DESC LIMIT 0, 10';
        return $this->createRequest($request, [$postId]);
    }

    /**
     * @param integer $postId
     * @param string $author
     * @param string $comment
     * @param integer $reportComment
     * @return PDOStatement
     */
    public function newComment(int $postId, string $author, string $comment,int $reportComment): PDOStatement {
        $request = 'INSERT INTO comments id_post, author, comment, report_comment, creation_date VALUES ?, ?, ?, ?, NOW()';
        return $this->createRequest($request, [
            'id_post' => $postId,
            'author' => $author,
            'comment' => $comment,
            'report_comment' => $reportComment
            ]);
    }
}