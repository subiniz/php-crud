<?php
require 'database.php';

$id = $_GET['id'];
$sql = "DELETE FROM students where id = $id";
if(mysqli_query($conn, $sql)) {
    // echo "Data Successfully Deleted!";
    header('location: index.php');
} else {
    echo mysqli_error($conn);
}