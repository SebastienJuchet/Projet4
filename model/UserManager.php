<?php
require_once 'model/ConnexionDb.php';


class UserManager extends ConnexionDb
{
    public function userConnexion($username) {
        $request = 'SELECT id, username, pass FROM users WHERE username = :username';
        return $this->createRequest($request, [':username' => $username]);
    }
}