<?php
class Manager 
{
    private $host = 'localhost';
    private $db_name = 'blog_forteroche';
    private $user_name = 'root';
    private $pass = '';

    /**
     * function of connection data base
     *
     * @return 
     */
    protected function getConnection() 
    {
        $db = new PDO("mysql:host=" . $this->host .";dbname=" . $this->db_name . ';charset=utf8', $this->user_name, $this->pass);
        return $db;
    }
}