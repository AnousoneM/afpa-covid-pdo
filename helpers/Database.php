<?php

class Database
{
    /**
     * Méthode qui retourne une instance de la classe PDO
     * @return objet PDO
     */
    public static function getInstancePDO(): object
    {

        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8mb4';

        try {
            // création d'une instannce de la classe PDO
            $pdo = new PDO($dsn, USER_DATABASE, PASSWORD_DATABASE);
            if ($pdo) {
                return $pdo;
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}
