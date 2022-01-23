<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List | Index</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
            <?php
            // Perform Querry
            $sql = "SELECT * FROM students";
            if ($result = mysqli_query($conn, $sql)) {  
            // echo "Returned Rows are: " . mysqli_num_rows($result) . "<br>";
            ?>
            <h1>CRUD Operations</h1>
            <a href="insert.php" class="link-btn"> + Add New Student</a>
            <div class="table-container">
                <table>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"]; // Just for ease of use
                        ?>
                    <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <!-- Ternery Operator -->
                            <td><?php echo $row["gender"] == 'm' ? 'Male' : 'Female';?></td>
                            <td>
                                <!-- Pass the user $id via GET method in url -->
                                <a href="update.php?id=<?php echo $id; ?>">Update</a> | 
                                <a onclick="return confirm('Are You Sure?');" href="delete.php?id=<?php echo $id; ?>"> Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>    
            <?php
        } else {
            ?>
            <table>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    ?>
                <tr>
                    <td colspan="100%">N/A</td>
                </tr>
                <?php
                }
                ?>
            </table>
            <?php
        }
        ?>
    </div>    
</body>
</html>
