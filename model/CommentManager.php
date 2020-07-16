<?php
require_once 'model/ConnexionDb.php';

class CommentManager extends ConnexionDb 
{
    /**
     * @var int
     */
    public CONST DEFAULT_SIZE = 10;

    /**
     * @param integer $postId
     * @return PDOStatement
     */
    public function getComments(int $postId,int $currentPage): PDOStatement 
    {
        $first = ($currentPage * self::DEFAULT_SIZE) - self::DEFAULT_SIZE;

        $request = 'SELECT id, id_post, author, comment, report_comment, DATE_FORMAT(creation_date, \'%d-%m-%Y à %hH:%mMin\') AS creation_date_fr FROM comments WHERE id_post=? ORDER BY creation_date DESC LIMIT ' . $first .', ' . self::DEFAULT_SIZE;
        return $this->createRequest($request, [$postId]);
    }

    /**
     * @param integer $postId
     * @return PDOStatement
     */
    public function countComments(int $postId): PDOStatement 
    {
        $request = 'SELECT COUNT(*) FROM comments WHERE id_post = ? ORDER BY creation_date DESC';
        return $this->createRequest($request, [$postId]);
    }

    /**
     * @param integer $postId
     * @param string $author
     * @param string $comment
     * @param $reportComment
     * @return PDOStatement
     */
    public function newComment(int $postId, string $author, string $comment, int $reportComment): PDOStatement 
    {
        $request = 'INSERT INTO comments (id_post, author, comment, report_comment, creation_date) VALUES (:id_post, :author, :comment, :report_comment, NOW())';
        
        return $this->createRequest($request, [
            ':id_post' => $postId,
            ':author' => $author,
            ':comment' => $comment,
            ':report_comment' => $reportComment
        ]);
    }

    /**
     * @param integer $idComment
     * @return PDOStatement
     */
    public function deleteComment(int $idComment): PDOStatement 
    {
        $request = 'DELETE FROM comments WHERE id = :id';
        
        return $this->createRequest($request, [
            ':id' => $idComment
        ]);
    }

    /**
     * @param integer $idComment
     * @return PDOStatement
     */
    public function updateReportComment(int $idComment):PDOStatement 
    {
        $request = 'UPDATE comments SET report_comment = 1 WHERE id = ?';

        return $this->createRequest($request, [$idComment]);
    }

    /**
     * @param integer $idMessageReport
     * @param string $typeReport
     * @return PDOStatement
     */
    public function reportComment(int $idMessageReport, string $typeReport):PDOStatement 
    {
        $request = 'INSERT INTO report_type_comment (id_message_report, type_report, date_report) VALUES (:id_message_report, :type_report, NOW())';

        return $this->createRequest($request, [
            ':id_message_report' => $idMessageReport,
            ':type_report' => $typeReport
        ]);
    }

    /**
     * @return PDOStatement
     */
    public function listReportComment(int $currentPage):PDOStatement 
    {
        $first = ($currentPage * self::DEFAULT_SIZE) - self::DEFAULT_SIZE;

        $request = 'SELECT type_report, DATE_FORMAT(date_report, \'%d-%m-%Y à %hH:%mMin\') AS date_report_fr, author, comment, id
                    FROM report_type_comment 
                    LEFT JOIN comments ON id_message_report = comments.id 
                    WHERE report_comment = 1
                    ORDER BY date_report DESC LIMIT ' . $first . ',' . self::DEFAULT_SIZE;

        return $this->createRequest($request);
    }

    /**
     * @param integer $idMessageReport
     * @return PDOStatement
     */
    public function deleteCommentReport(int $idMessageReport):PDOStatement 
    {
        $request = 'DELETE FROM report_type_comment WHERE id_message_report = :id_message_report';
        
        return $this->createRequest($request, [
            ':id_message_report' => $idMessageReport
        ]);
    }

    /**
     * @return PDOStatement
     */
    public function countReportComment():PDOStatement 
    {
        $request = 'SELECT COUNT(*) FROM report_type_comment ORDER BY date_report DESC';

        return $this->createRequest($request);
    }

    public function deleteTableReport($idComment):PDOStatement 
    {
        $request = 'DELETE FROM report_type_comment WHERE id_message_report = :id_message_report';
        
        return $this->createRequest($request, [
            ':id_message_report' => $idComment
        ]);
    }

    public function commentReportAuthorized($idComment) 
    {
        $request = 'UPDATE comments SET report_comment = 2 WHERE id = :id';

        return $this->createRequest($request, [
            ':id' => $idComment
        ]);
    }
}
