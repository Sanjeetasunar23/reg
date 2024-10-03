<?php
include'student.php';

// Handle form submission
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $image = $_FILES['image']['name'];
    // if (!empty($image)) {
    //     $target_dir = "uploads/";
    //     $target_file = $target_dir . basename($image);
    //     move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    // } else {
    //     $image = null;
    // }
 


    // Insert data into the database
    $sql = "INSERT INTO student (name, gender, address, email, password, image)
            VALUES ('$name','$gender', '$address', '$email', '$password', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Registration form</title>
        <link rel="stylesheet" href="styless.css">
    </head>
    <body>
       
    
        </div>
        <div class="container">
            <h4>Registration Form</h4>
            <form action="index.php" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required="required" placeholder="Enter Full Name">
                    
                </div>
                
                <div class="group">
                    <label for="male">Gender</label>
                    <input type="radio" name="gender" id="male" value="Male" checked="checked">Male
                    <input type="radio" name="gender" id="female" value="Female">Female
                    <input type="radio" name="gender" id="others" value="Others">Others
                </div>

                <div class="group">
                    <label for="address">Address</label>    
                    <input type="text" name="address" id="address" required="required" placeholder="Enter your address">
                </div>
                
                <div class="group">
                    <label for="email">Email</label>    
                    <input type="text" name="email" id="email" required="required" placeholder="Enter your email">
                </div>
                <div class="group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required="required" placeholder="********">
                </div>
                <!-- <div class="group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div> -->
                <button id="submit button">Submit</button>
            </form>
        </div>
        <a href="login.php">Login</a>
    </body>
</html>
