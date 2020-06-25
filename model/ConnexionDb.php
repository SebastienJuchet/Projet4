<?php
abstract class ConnexionDb 
{
    /**
     * @var string
     */
    private CONST HOST = 'localhost';

    /**
     * @var string
     */
    private CONST DB_NAME = 'blog_forteroche';

    /**
     * @var string
     */
    private CONST USER_NAME = 'root';

    /**
     * @var string
     */
    private CONST PASS = '';

    /**
     * @var PDO
     */
    protected $connexion;


    /**
     * @return PDO
     */
    private function getConnection(): PDO 
    {
        if($this->connexion) {
            return $this->connexion;
        }

        try {
            
            $this->connexion = new PDO("mysql:host=" . self::HOST .";dbname=" . self::DB_NAME . ';charset=utf8', self::USER_NAME, self::PASS);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connexion;
        }
        catch (Exception $errorConnection) {
            die('Erreur : ' . $errorConnection->getMessage());
        }
        
    }
    /**
     * @param string $sql
     * @param array|null $params
     * @return PDOStatement
     */
    protected function createRequest(string $sql, ?array $params = null): PDOStatement 
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
