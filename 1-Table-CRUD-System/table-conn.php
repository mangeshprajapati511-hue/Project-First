<?php
$mysqli = new mysqli('localhost','hachiekouser','','db_99');
if($mysqli -> connect_errno)
{
    echo 'Failed to connect to Mysql:'.mysqli -> connect_error;
    die;
}
  
if(!($stmt = $mysqli->prepare("INSERT INTO student1(Name,College,Branch,Fee)VALUES(?,?,?,?)"))){

    echo "Prepare failed:(".$mysqli->errno.")".$mysqli->error;
    die;
}
    
$name="Ajay";
$collage="NIT";
$branch="Net";
$fee=50000;

if(!$stmt->bind_param("sssi",$name, $collage,$branch,$fee)){
    echo "Binding parameters failed:(".$mysqli->errno.")".$mysqli->error;
    die;
} 

if(!$stmt->execute()){
    echo "Execution failed:(".$mysqli->errno.")".$mysqli->error;
    die;
}

$stmt->close();
$mysqli->close();

?>