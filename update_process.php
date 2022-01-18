<?php
require 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$id = $_POST['id']; //This value comes via the `hidden` input type
//UPDATE students SET name = $_POST['name'], email = $_POST['email'] WHERE id = $_POST['id'];
$sql = "UPDATE students SET name='$name', email='$email', gender='$gender' WHERE id ='$id'";

if(mysqli_query($conn, $sql)) {
    header('location: index.php'); //redirects the user to index page
    // echo 'The data updated successfully!';
} else {
    echo mysqli_error($conn);
}