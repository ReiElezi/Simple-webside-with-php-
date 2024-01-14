<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert into users
$sql = "INSERT INTO users (id, firstName, lastName, email, password, role) 
        VALUES (1, 'Rei', 'Elezi', 'elezirei8@gmail.com', 'password123', 'Admin'),
               (2, 'Klaudia', 'Elezi', 'eleziklaudia8@gmail.com', 'password456', 'User'),
               (3, 'Artan', 'Elezi', 'eleziartan8@gmail.com', 'password789', 'User')";

if (mysqli_query($conn, $sql)) {
    echo "Records inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>