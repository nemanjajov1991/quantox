<?php

class Student
{
    /**
     * @var PDO
     */
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getStudent($id)
    {
        $conn  = new PDO('mysql:host=localhost;port=3306;dbname=school_board',
            'root',
            '',
            array(PDO::ATTR_PERSISTENT => true));
        $stmt = $conn->prepare("SELECT * FROM student WHERE id=?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        return $user;
    }


}
