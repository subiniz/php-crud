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
    <div class="container">
        <h1>Insert Form</h1>
        <form action="insert_process.php" method="POST" enctype="multipart/form-data">
            <div class="form-input">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="text-input">
            </div>
            <div class="form-input">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="text-input">
            </div>
            <div class="form-input">
                <label for="">Profile Image</label>
                <input type="file" name="image" id="" style="margin-left: 22%;">
            </div>
            <div class="form-input">
                <label for="">Gender</label>
                <input type="radio" name="gender" id="" value="m" checked="checked" style="margin-left: 22%;"> Male  
                <input type="radio" name="gender" id="" value="f"> Female
            </div>
            <div class="form-input">
                <input type="submit" value="Submit" class="submit-btn">
                <a href="index.php" class="link-btn"> <<< Go Back</a>
            </div>
        </form>
    </div>
</body>
</html>