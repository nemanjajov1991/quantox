<?php
/**
 * Created by PhpStorm.
 * User: Puki doktor
 * Date: 3/3/2019
 * Time: 12:25 PM
 */

class Database
{
    private $host = 'localhost';
    private $db_name = 'school_board';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {

        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
