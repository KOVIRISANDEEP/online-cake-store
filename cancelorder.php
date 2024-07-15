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
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            max-width: 400px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .container h2 {
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
    <div class="container">
        <h2>Cancel Order</h2>
        <form action="cancelorder.php" method="post">
            <label for="order_id">Order ID:</label>
            <input type="text" id="order_id" name="order_id" required>

            <button type="submit">Cancel Order</button>
        </form>
        <div class="actions">
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

// Handle cancel order form submission 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST["order_id"];

    // SQL query to delete the order
    $sql = "DELETE FROM cakeorder WHERE id='$order_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Order canceled successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
