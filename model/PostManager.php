<?php 
require 'model/Manager.php';

class PostManager extends Manager 
{
    /**
     * Function display list posts
     *
     * @return array
     */
    public function getPosts()
    {
        $db = $this->getConnection();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d-%m-%Y\') AS date_creation_fr FROM post');
        $req->execute();
        return $req;
    }
}