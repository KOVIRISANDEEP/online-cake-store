<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
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
            max-width: 800px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .container h2 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
    <div class="container">
        <h2>Your Orders</h2>
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

        // Fetch all orders
        $sql = "SELECT * FROM cakeorder";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Flavour</th>
                        <th>Weight</th>
                        <th>Delivery Date</th>
                        <th>Description</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["flavour"] . "</td>
                        <td>" . $row["weight"] . "</td>
                        <td>" . $row["deliverydate"] . "</td>
                        <td>" . $row["description"] . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "No orders found.";
        }

        $conn->close();
        ?>
        <div class="actions">
            <a href="order.php">Order More</a>
            <a href="dashboard.php">Back</a>
        </div>
    </div>
</body>
</html>
