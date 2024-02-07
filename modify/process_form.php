<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Database connection details
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test';
    $table = 'coaching_data';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO $table (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Data inserted successfully</p>";
    } else {
        echo "<p>Error inserting data: " . $conn->error . "</p>";
    }

    // Close connection
    $conn->close();
} else {
    // Display a message if the form is not submitted
    echo "<p>Please submit the form.</p>";
}
?>