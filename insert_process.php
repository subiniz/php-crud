<?php
require 'database.php';

/**
 * Image Upload Process
 * 1. Get the image via $_FILES global variable
 * 2. Check if the image is empty or not and apply logic accordingly
 * 3. If image is available, update the `students` table `image` column
 * 4. Now, upload the actual image file to a specific location in the server
 */

$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$imageName = NULL;

if(!empty($_FILES['image']['name'])) { // This checks if the image name is empty or not

    // Validate the extension/type of the image
    if($imageType == 'png') { // Your Task
        $imageName = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        $folder = "images/$imageName";
    } else {
        echo "Only PNG files are allowed";
        die;
    }

    // Validate the size of the uploaded image
    if($imageSize > '1MB') { // Your Task
        echo "File size too large. Please upload only upto 1MB.";
        die;
    }
    
}
// echo '<pre>';
// var_dump($_FILES);
// die;
//UPDATE students SET name = $_POST['name'], email = $_POST['email'] WHERE id = $_POST['id'];
$sql = "INSERT INTO students (name, email, gender, image) VALUES ('$name', '$email' ,'$gender', '$imageName')";

if(mysqli_query($conn, $sql)) {
    if($imageName) {
        //move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIRECTORY);
        move_uploaded_file($tempName, $folder); // in-built php function that allows to upload a file
    }
    header('location: index.php'); //redirects the user to index page
    // echo 'The data updated successfully!';
} else {
    echo mysqli_error($conn);
}