<?php
session_start();

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

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $password = $_POST["password"];

    // SQL query to verify user
    $sql = "SELECT * FROM registration WHERE name='$name' AND pword='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION["name"] = $name;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid credentials. Please try again.'); window.location.href='login.php';</script>";
    }
}

$conn->close();
?>
