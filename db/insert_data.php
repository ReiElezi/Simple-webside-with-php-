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

// // Insert into users
// INSERT INTO users (id, firstName, lastName, email, password, role) 
//         VALUES (1, 'Rei', 'Elezi', 'elezirei8@gmail.com', 'password123', 'Admin'),
//                (2, 'Klaudia', 'Elezi', 'eleziklaudia8@gmail.com', 'password456', 'User'),
//                (3, 'Artan', 'Elezi', 'eleziartan8@gmail.com', 'password789', 'User')";

// -- Insert sample data into the 'products' table
$sql = "INSERT INTO products (name, description, price, image_url, category) VALUES
('Qeleshe', 'Traditional Albanian hat', 20.00, 'img/qeleshe.jpeg', 'others'),
('Kapele', 'Another traditional item', 5.00, 'img/kapele.jpg', 'others'),
('Shall kuq e zi', 'Red and black scarf', 12.00, 'img/shall.jpeg', 'others'),
('Stampa', 'Traditional stamp', 8.00, 'img/stamp.jpeg', 'others'),
('Fanella 2016', 'Albanian flag t-shirt', 50.00, 'img/fanella.jpg', 'clothing'),
('Fanella 2014', 'Another Albanian flag t-shirt', 50.00, 'img/bluz2.jpeg', 'clothing'),
('Fanella 2017', 'Yet another Albanian flag t-shirt', 50.00, 'img/bluz4.jpg', 'clothing'),
('Hodie me Shqiponje', 'Eagle hoodie', 50.00, 'img/bluz5.jpeg', 'clothing'),
('Hodie i zi me Shqiponje', 'Black hoodie with eagle', 50.00, 'img/bluz6.webp', 'clothing')";

// -- Create the 'users' table (if needed for user-related features)
// CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     password VARCHAR(255) NOT NULL
// );

if (mysqli_query($conn, $sql)) {
    echo "Records inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>