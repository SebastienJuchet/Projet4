<?php
require_once 'model/ConnexionDb.php';


class UserManager extends ConnexionDb
{
    /**
     * @param [type] $username
     * @return PDOStatement
     */
    public function userConnexion($username): PDOStatement
    {
        $request = 'SELECT id, username, pass FROM users WHERE username = :username';
        return $this->createRequest($request, [':username' => $username]);
    }
}
