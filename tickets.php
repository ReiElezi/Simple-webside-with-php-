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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["Email"];
    $creditCard = $_POST["creditCard"];
    $numTickets = $_POST["numTickets"];

    // Insert data into the database
    $sql = "INSERT INTO tickets (category, name, surname, email, creditCard, numTickets)
            VALUES ('$category', '$name', '$surname', '$email', '$creditCard', '$numTickets')";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket information added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>