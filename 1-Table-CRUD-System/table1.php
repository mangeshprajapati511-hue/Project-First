<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body class="bg-dark">

    <?php

    $mysqli = new mysqli('localhost', 'hachiekouser', '', 'db_99');

    if ($mysqli->connect_errno) {
        echo 'Failed to connect to Mysql:' . $mysqli->connect_error;
        die;
    }

    ?>

    <table class="table-striped table-bordered table-hover mt-5 "
        style="background-color: darkgrey; text-align: center; " cellpadding="30" cellspacing="" align="center">
        <tr>
            <th style="border:none;background-color: darkgrey"> <a href="insert.php" class="btn btn-secondary btn-sm" style="border:none;"> Add <i class="fas fa-plus-circle"></i></a></th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>College</th>
            <th>Branch</th>
            <th>Fee</th>
            <th>gender</th>
            <th><button class="btn btn-secondary btn-md" type="button">Edit</button></th>
            <th><button class="btn btn-secondary btn-md" type="button">Delete</button></th>

        </tr>
        <?php
        $res = $mysqli->query("select * from student1");
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<tr>
                <td>{$row['ID']}</td> 
                <td>{$row['Name']}</td> 
                <td>{$row['College']}</td> 
                <td>{$row['Branch']}</td> 
                <td>{$row['Fee']}</td> 
                <td>{$row['gender']}</td> 

         <td>
            <a href='edit.php?id=" . $row['ID'] . "' class='btn btn-secondary'>
                <i class='fas fa-edit fa-2x'></i>
            </a>
         </td> 

            <td>
             <a  href='delete.php?id=" . $row['ID'] . "' 
             class='btn btn-secondary'
             onclick=\"return confirm('Are You sure for delete data!!') \">
             <i class='fas fa-trash-alt fa-2x'></i>
             </a>
             </td> 
        </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }

        ?>
    </table>
</body>

</html>