<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = htmlspecialchars($_POST["fullName"]);
    $email = htmlspecialchars($_POST["email"]);
    $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
    $birthDate = htmlspecialchars($_POST["birthDate"]);
    $gender = htmlspecialchars($_POST["gender"]);

    // Database connection details
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test';
    $table = 'admission_datasheet';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO $table (fullName, email, phoneNumber, birthDate, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssss", $fullName, $email, $phoneNumber, $birthDate, $gender);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p>Data inserted successfully</p>";
    } else {
        echo "<p>Error inserting data: " . $stmt->error . "</p>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<p>Invalid request</p>";
}
?>
