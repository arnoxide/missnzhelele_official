<?php
// Establish database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "missnzhelele";
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $lastname = $_POST["lastname"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $motto = $_POST["motto"];

    // Handle uploaded picture
    $picture = $_FILES["picture"]["name"];
    $temp_file = $_FILES["picture"]["tmp_name"];
    $picture_path = "uploads/" . $picture;
    move_uploaded_file($temp_file, $picture_path);

    // Insert data into the database
    $sql = "INSERT INTO users (fullname, lastname, age, email, location, phone, picture, motto)
            VALUES ('$fullname', '$lastname', '$age', '$email', '$location', '$phone', '$picture_path', '$motto')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="register.php" method="POST" enctype="multipart/form-data">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" required><br><br>
        
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" required><br><br>
        
        <label for="age">Age:</label>
        <input type="number" name="age" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="location">Location:</label>
        <input type="text" name="location" required><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br><br>
        
        <label for="picture">Picture:</label>
        <input type="file" name="picture" required><br><br>
        
        <label for="motto">Motto (300 words):</label><br>
        <textarea name="motto" rows="10" cols="30" required></textarea><br><br>
        
        <input type="submit" value="Register" name="POST">
    </form>
</body>
</html>
