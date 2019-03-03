<?php

class Registration
{
    /**
     * @var PDO
     */
    private $conn;

    public function __construct($database)
    {
        $this->conn = $database;
    }

    public function register($name, $board_type_id)
    {
        $response = true;
        $conn  = new PDO('mysql:host=localhost;port=3306;dbname=school_board',
            'root',
            '',
            array(PDO::ATTR_PERSISTENT => true));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO student (student_name, board_type_id) VALUES (:student_name, :board_type_id)");
        $stmt->bindParam(":student_name", $name);
        $stmt->bindParam(":board_type_id", $board_type_id);

        $stmt->execute();

        return $response;
    }
}
