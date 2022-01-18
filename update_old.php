<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Students</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php

// $sql = "UPDATE students set name='Mary Doe', email='mary@doe.com', gender='f' where id = 1";

// if(mysqli_query($conn, $sql)) {
//     echo 'The data updated successfully!';
// } else {
//     echo mysqli_error($conn);
// }

$id = $_GET['id'];

$select_qry = "select * from students where id = $id";

//mysqli_query - run the query
//mysqli_num_rows - gets the returned count of rows
//fetch_assoc - returns the actual values of the rows in an array

if($result = mysqli_query($conn, $select_qry)) {
    if(mysqli_num_rows($result) == 0) { //mysqli_num_rows -> to get the number of returned values
        echo "<h2>Sorry, the data you requested is not available!</h2>";
    } else {
        // echo '<pre>';
        // var_dump($result->fetch_assoc());
        $student = $result->fetch_assoc();

        ?>
            <div class="container">
                <h1>Update Form</h1>
                <form action="update_process.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                    <div class="form-input">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="text-input" 
                        value="<?php echo $student['name']; ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" class="text-input"
                        value="<?php echo $student['email']; ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Gender</label>
                        <input type="radio" name="gender" id="" value="m" 
                        <?php echo $student['gender'] == 'm' ? 'checked' : ''; ?>
                        > Male  
                        <input type="radio" name="gender" id="" value="f" 
                        <?php echo $student['gender'] == 'f' ? 'checked' : ''; ?>
                        > Female
                    </div>
                    <div class="form-input">
                        <input type="submit" value="Submit" class="submit-btn">
                        <a href="index.php" class="link-btn"> <<< Go Back</a>
                    </div>
                </form>
            </div>
        <?php
    }
} else {
    echo "Sorry, no data available";
}

?>
</body>
</html>