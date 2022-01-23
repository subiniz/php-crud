<?php
require 'database.php';
//1. Fetch the Id of the desired user = DONE
//2. Run the SELECT query to get the data of the desired user using the provided id = DONE
//3. Use that data to fill the update form with user data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
// echo "The value of GET param is " . $_GET['id'];
$id = $_GET['id']; // --- STEP 1 COMPLETED ---
$sql = "SELECT * FROM students where id = $id"; // This always returns either 1 data or none
if($result = mysqli_query($conn, $sql)) {
    // echo '<pre>';
    // var_dump($result); // field_count -> number of columns in table, num_rows -> num of data
    if(mysqli_num_rows($result) == 0) {
        echo "Sorry, the ID you requested is not available!";
    } else {
        $student = $result->fetch_assoc(); // --- STEP 2 COMPLETED ---
        // echo '<pre>';
        // var_dump($student);
        ?>
        <div class="container"> <!-- STEP 3 -->
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
                    <?php echo $student['gender'] == 'm' ? 'checked' : ''; ?>> Male 

                    <input type="radio" name="gender" id="" value="f"
                    <?php echo $student['gender'] == 'f' ? 'checked' : ''; ?>> Female
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
    echo "Some Error Occoured!";
}

?>

</body>
</html>