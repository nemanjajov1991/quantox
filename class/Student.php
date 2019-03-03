<?php

class Student
{

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getStudent($id)
    {
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=school_board',
            'root',
            '',
            array(PDO::ATTR_PERSISTENT => true));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM student WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getCSMoardResult($student_id)
    {
        $grades = array();
        $br = 0;
        $sr = 0;
        $s = 0;

        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=school_board',
            'root',
            '',
            array(PDO::ATTR_PERSISTENT => true));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT s.student_name, g.grade FROM student as s INNER JOIN grade as g ON s.id = g.student_id WHERE s.id=?");
        $stmt->execute([$student_id]);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($grades, $row['grade']);
            $s += $row['grade'];
            $br++;
        }

        $sr = $s / $br;
        $result = $sr >= '7' ? 'Pass' : 'Fail';
        $response = array(
            'name' =>  $row['student_name'],
            'grades' => $grades,
            'average' => $sr,
            'result' => $result
        );
        return json_encode($response);
    }


    public function getCSMBoardResult($student_id)
    {
        $rows = array();
        $grades = array();
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=school_board',
            'root',
            '',
            array(PDO::ATTR_PERSISTENT => true));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT s.student_name, g.grade FROM student as s INNER JOIN grade as g ON s.id = g.student_id WHERE s.id=?");
        $stmt->execute([$student_id]);
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            array_push($grades, $row['grade']);
            array_push($rows, $row);
        }

        return  $grades;
    }
}
