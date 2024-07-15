<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Order</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('images/cake-background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        .navbar {
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            margin: 50px auto;
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
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
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Sign Up</a>
    </div>
    <div class="container">
        <h2>Cancel Order</h2>
        <form action="cancel_order.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <button type="submit">Cancel Order</button>
        </form>
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

// Handle cancel order form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    
    // SQL query to delete the order
    $sql = "DELETE FROM cakeorder WHERE name='$name'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Order canceled successfully!'); window.location.href='ordersuccess.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
