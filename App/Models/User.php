<?php

    namespace App\Models;

    use PDO;

    /**
     * Example user model
     *
     * PHP version 7.0
     */
    class User extends \Core\Model
    {

        /**
         * Get all the users as an associative array
         *
         * @return array
         */
        public static function getAll()
        {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, name FROM users');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        /**
         * Get one user
         *
         * @return user
         */
        public static function getOne($login)
        {
            $db = static::getDB();
            $stmt = $db->query('SELECT * FROM users where login like "'.$login.'"');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        /**
         * Add user to db-table or create table if it is not there
         *
         * @return if it is created
         */
        public static function addUser($login, $pass)
        {
            try {
                $db = static::getDB();
                $sql = "INSERT INTO `users` (`login`, `pass`) VALUES ('$login', '$pass')";
                $db->exec($sql);
                $output = "user has been created";
            } catch (PDOException $e) {
                $output = "Database error: " . $e->getMessage();
            }
            return $output;
        }
    }
