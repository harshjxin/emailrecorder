<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the email input value
    $email = $_POST['email'];

    // Database connection
    $servername = "localhost"; // Change to your server name
    $username = "username";   // Change to your MySQL username
    $password = "password";   // Change to your MySQL password
    $dbname = "vr_bookings";  // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert email into the database
    $sql = "INSERT INTO bookings (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
