<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch hotels from the database
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);

// Store hotel data in an array
$hotels = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $hotels[] = $row;
    }
}

// Close the database connection
$conn->close();

// Output hotel data as JSON
header('Content-Type: application/json');
echo json_encode($hotels);
?>
