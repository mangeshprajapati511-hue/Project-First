<?php      

$mysqli = new mysqli('localhost','hachiekouser','','db_99');

    if($mysqli -> connect_errno)
   {
        echo 'Failed to connect to Mysql:'.$mysqli -> connect_error;
        die;
    }

    $id = $_GET['id'];

    $sql = "DELETE FROM student1 WHERE id= $id";
    
    if($mysqli->query($sql)){
        header("Location:table1.php");
        exit();
    }   
    else{
        echo "Error deleting record: " . $mysqli->error;
    }
?> 