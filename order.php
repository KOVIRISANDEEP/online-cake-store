<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
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

        form label, form input, form textarea {
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

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .actions a {
            margin: 0 10px;
            color: #333;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
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
        <h2>Order Form</h2>
        <form action="order.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="flavour">Flavour:</label>
            <input type="text" id="flavour" name="flavour" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" name="weight" required>

            <label for="delivery">Delivery Date:</label>
            <input type="date" id="delivery" name="delivery" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit">Place Order</button>
        </form>
        <div class="actions">
            <a href="vieworder.php">View Orders</a>
            <a href="dashboard.php">Back</a>
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

// Handle order form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $flavour = $_POST["flavour"];
    $weight = $_POST["weight"];
    $delivery = $_POST["delivery"];
    $description = $_POST["description"];

    // SQL query to insert data into the orders table
    $sql = "INSERT INTO cakeorder (name, flavour, weight, deliverydate, description) 
            VALUES ('$name', '$flavour', '$weight', '$delivery', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Order placed successfully!'); window.location.href='ordersuccess.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
