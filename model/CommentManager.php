<?php
require_once 'model/ConnexionDb.php';

class CommentManager extends ConnexionDb 
{
    /**
     * function display comment for id post
     *
     * @param [string] $postId 
     * @return
     */
    public function getComments($postId) {
        $request = 'SELECT id_post, author, comment, report_comment, DATE_FORMAT(creation_date, \'%d-%m-%Y à %hH:%mMin\') AS creation_date_fr FROM comments WHERE id_post=? ORDER BY creation_date DESC LIMIT 0, 10';
        return $this->createRequest($request, [$postId]);
    }

    public function newComment($postId, $author, $comment, $reportComment) {
        $request = 'INSERT INTO comments id_post, author, comment, report_comment, creation_date VALUES ?, ?, ?, ?, NOW()';
        return $this->createRequest($request, [
            'id_post' => $postId,
            'author' => $author,
            'comment' => $comment,
            'report_comment' => $reportComment
            ]);
    }
}