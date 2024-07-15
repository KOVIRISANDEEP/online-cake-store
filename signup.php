<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: url('images/cake-background.jpg');
            background-size: cover;
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
        <div class="form-container">
            <h2>Registration Form</h2>
            <form method="POST" action="registration.php">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="phoneno">Phone No:</label>
                <input type="text" id="phoneno" name="phoneno" required><br><br>
                <label for="pword">Password:</label>
                <input type="password" id="pword" name="pword" required><br><br>
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" required><br><br>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required><br><br>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>
