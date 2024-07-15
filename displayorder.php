<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Order Details</title>
<style>
    body {
        background-color: pink;
        text-align: center;
        margin-top: 100px;
    }
    table {
        margin: 0 auto;
        border-collapse: collapse;
        width: 80%;
    }
    table, th, td {
        border: 1px solid black;
        padding: 10px;
    }
    th, td {
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    button {
        background-color: rgb(104, 104, 251);
        color: white;
        font-size: 20px;
    }
    h1 {
        text-transform: capitalize;
        font-size: 50px;
    }
</style>
</head>
<body>
    <center><h1>Your Order Details</h1></center>
    <form method="POST" action="displayorder.php">
        <label for="name">Enter Name to View Order:</label>
        <input type="text" id="name" name="name" required>
        <input type="submit" value="View Order">
    </form>
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

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];

        // SQL query to retrieve details for the specified name
        $sql = "SELECT cakeorder.*, registration.email, registration.phoneno, registration.gender, registration.location
                FROM cakeorder
                LEFT JOIN registration ON cakeorder.name = registration.name
                WHERE cakeorder.name = '$name'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Flavour</th>
                        <th>Weight</th>
                        <th>Delivery Date</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Location</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["flavour"] . "</td>
                        <td>" . $row["weight"] . "</td>
                        <td>" . $row["deliverydate"] . "</td>
                        <td>" . $row["description"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phoneno"] . "</td>
                        <td>" . $row["gender"] . "</td>
                        <td>" . $row["location"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No results found for the specified name.";
        }
    }
    $conn->close();
    ?>
    <br><br>
    <button onclick="window.location.href='pract.html'">Logout</button>
</body>
</html>
