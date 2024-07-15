<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/cake-background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            padding: 25px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .container h2 {
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label, form input {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
        }

        form button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="registration.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="Gender">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Register</button>
        </form>
        <div class="actions">
            <a href="index.php">Back</a>
        </div>
    </div>
</body>
</html>

<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Default MySQL root password in XAMPP is empty
$dbname = "cos";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    // SQL query to insert data into the registration table
    $sql = "INSERT INTO registration (name, email, phoneno, pword) 
            VALUES ('$name', '$email', '$phone', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!'); window.location.href='registrationsuccess.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
