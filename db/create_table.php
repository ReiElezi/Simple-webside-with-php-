<?php
$servername= "localhost";
$username ="root";
$password = "" ;
$dbname = "euro2024";

$conn = mysqli_connect($servername,$username,$password ,$dbname);

//kontrollon lidhjen

if(!$conn){
    die("Lidhja deshtoi" .mysqli_connect_error());

}

// $sql_create_table_users = "CREATE TABLE users(
//     id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
//     firstName VARCHAR(255) NOT NULL,
//     lastName VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL UNIQUE ,
//     role VARCHAR(255) NOT NULL   
//     ) ";

//     if(mysqli_query($conn,$sql_create_table_users)){
//         echo "Tabela u krijua me sukses";
//     }
//     else{
//         echo "Tabela pati nje proble <br> ". mysql_error($conn);

//     }

// $sql_create_table_tickets = "CREATE TABLE IF NOT EXISTS tickets (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     category INT,
//     name VARCHAR(255),
//     surname VARCHAR(255),
//     email VARCHAR(255),
//     creditCard VARCHAR(16),
//     numTickets INT
// )";
    
//  $sql_create_table_tickets = "CREATE TABLE IF NOT EXISTS hotels (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255),
//     description TEXT,
//     price DECIMAL(10, 2),
//     image_path VARCHAR(255)
// )";

// $sql_create_table_tickets = "CREATE TABLE products (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     description TEXT,
//     price DECIMAL(10, 2) NOT NULL,
//     image_url VARCHAR(255) NOT NULL,
//     category VARCHAR(50) NOT NULL
// )";

// $sql_create_table_tickets = "CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     password VARCHAR(255) NOT NULL
// )";


    if(mysqli_query($conn,$sql_create_table_tickets)){
        echo "Tabela u krijua me sukses";
    }
    else{
        echo "Tabela pati nje proble <br> ". mysqli_error($conn);

    }

    mysqli_close($conn);

    ?>

