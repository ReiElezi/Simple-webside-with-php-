<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//kontrollon lidhjen
if (!$conn) {
    die("Lidhja deshtoi" . mysqli_connect_error());
}

$sql_create_table_users = "CREATE TABLE users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE ,
    role VARCHAR(255) NOT NULL   
    ) ";

if (mysqli_query($conn, $sql_create_table_users)) {
    echo "Tabela users u krijua me sukses";
} else {
    echo "Tabela users pati nje problem <br> " . mysqli_error($conn);
}

$sql_create_table_hotels = "CREATE TABLE IF NOT EXISTS hotels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_path VARCHAR(500) NOT NULL
)";

if (mysqli_query($conn, $sql_create_table_hotels)) {
    echo "Tabela hotels u krijua me sukses";
} else {
    echo "Tabela hotels pati nje problem <br> " . mysqli_error($conn);
}

$sql_create_table_products = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(500) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    category VARCHAR(50) NOT NULL
)";



if (mysqli_query($conn, $sql_create_table_products)) {
    echo "Tabela products u krijua me sukses";
} else {
    echo "Tabela products pati nje problem <br> " . mysqli_error($conn);
}

$sql_create_table_tickets_info = "CREATE TABLE IF NOT EXISTS tickets_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql_create_table_tickets_info)) {
    echo "Tabela tickets_info u krijua me sukses";
} else {
    echo "Tabela tickets_info pati nje proble <br> " . mysqli_error($conn);
}

$sql_tickets_order = "CREATE TABLE IF NOT EXISTS tickets_order (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    creditCard VARCHAR(16) NOT NULL,
    numTickets INT NOT NULL
)"; 
if (mysqli_query($conn, $sql_tickets_order)) {
    echo "Tabela tickets_order u krijua me sukses";
} else {
    echo "Tabela tickets_order pati nje proble <br> " . mysqli_error($conn);
}


mysqli_close($conn);
?>


