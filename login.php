
<?php
// Start a session
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // your MySQL username
$password = "";  // your MySQL password
$dbname = "student";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, now check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password matches, login successful
            $_SESSION['username'] = $row['username'];
            echo "Login successful! Welcome, " . $_SESSION['username'];
        } else {
            // Password incorrect
            echo "Invalid password. Please try again.";
        }
    } else {
        // User not found
        echo "No user found with this email. Please register first.";
    }
}

// Close the connection
$conn->close();
?>


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body><h2>Login</h2>
<div class ="container">
        
<form action="login.php" method="POST">
        <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        </div>
<div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
</div>
<div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
</div>
<div class="form-group">
        <button type="submit">Login</button>
</div>
    </form>
</div>

</body>
</html>