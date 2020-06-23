<?php
abstract class ConnexionDb 
{
    CONST HOST = 'localhost';
    CONST DB_NAME = 'blog_forteroche';
    CONST USER_NAME = 'root';
    CONST PASS = '';

    private $_connexion;

    /**
     * Connexion data base 
     */
    private function getConnection() 
    {
        $this->_connexion = null;

        try {
            $this->_connexion = new PDO("mysql:host=" . self::HOST .";dbname=" . self::DB_NAME . ';charset=utf8', self::USER_NAME, self::PASS);
            $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->_connexion;
        }
        catch (Exception $errorConnection) {
            die('Erreur : ' . $errorConnection->getMessage());
        }
        
    }
    /**
     * create connexion request
     *
     * @param [string] $sql
     * @param [string] $params
     * @return connection query or prepare
     */
    protected function createRequest($sql, $params = null) 
    {
        if ($params) {
            $result = $this->getConnection()->prepare($sql);
            $result->execute($params);
            return $result;
        }
        $result = $this->getConnection()->query($sql);
        return $result;
    }
}