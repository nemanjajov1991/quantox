<?php
require_once 'class/Database.php';
require_once  'class/Student.php';

    if(isset($_GET['student_id']))
        $student_id = $_GET['student_id'];

    $db = new Database();
    $student = new Student($db);

    $dohvati = $student->getStudent($student_id);
    $board_type_id = $dohvati['board_type_id'];

    if($board_type_id == '1')
    {
        $result = $student->getCSMoardResult($student_id);
        echo $result;
    }
    else
    {
        $result = $student->getCSMBoardResult($student_id);
        echo $result;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="application/javascript"/>
    <title>School board</title>
</head>
<body>
<div>

</div>
</body>
</html>

