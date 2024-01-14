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

$sql_create_table_users = "CREATE TABLE ticket(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
    )
    

    if(mysqli_query($conn,$sql_create_table_users)){
        echo "Tabela u krijua me sukses";
    }
    else{
        echo "Tabela pati nje proble <br> ". mysql_error($conn);

    }

    mysqli_close($conn);

    ?>

