<?php

$connect = mysqli_connect("127.0.0.1", "root", "", "wiki");

if ($connect->connect_error) 
{
die("Connection failed: " . $connect->connect_error);
}
echo "Connected successfully";

$newContent = $_POST['newContent'];

$newContent = htmlentities($newContent, ENT_QUOTES);

$sql = "INSERT INTO content (textt) Values ('".$newContent."')";

if ($connect->query($sql) == TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();

?>