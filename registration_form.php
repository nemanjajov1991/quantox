<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <title>Registration</title>
    <script>

        function registracija()
        {
            var name = document.getElementById('name').value;
            var board_type_id = document.getElementById('board_type_id').value;

            $.ajax({
                url: "functions/school_board_functions.php?function=registration",
                type: "post",
                data: {
                    name: name,
                    board_type_id: board_type_id
                },
                success: function (ret)
                {
                    var data = ret.message;

                    alert(data);
                }
            });
        }
    </script>
</head>
<body>
<div class="row">
    <div class="offset-md-4 col-md-4">

            <h4>Registration</h4>
            <hr>
            <div class="form-group">
                <label for="name">Student name</label>
                <input type="text" name="name" class="form-control" id="name"  placeholder="Student Name">
            </div>
            <div class="form-group">
                <label for="board_type_id">School Board</label>
                <select name="board_type_id" class="form-control" id="board_type_id">
                    <option value="Not Selected">Choose Board</option>
                    <option value="1">CSM</option>
                    <option value="2">CSMB</option>
                </select>
            </div>
            <button type="submit" name="btn_submit" class="btn btn-primary" onclick="registracija();">Register</button>

    </div>
</div>
</body>
</html>
