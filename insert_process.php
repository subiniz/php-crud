<?php
require 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
//UPDATE students SET name = $_POST['name'], email = $_POST['email'] WHERE id = $_POST['id'];
$sql = "INSERT INTO students (name, email, gender) VALUES ('$name', '$email' ,'$gender')";

if(mysqli_query($conn, $sql)) {
    header('location: index.php'); //redirects the user to index page
    // echo 'The data updated successfully!';
} else {
    echo mysqli_error($conn);
}