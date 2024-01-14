<?php
$servername= "localhost";
$username ="root";
$password = "" ;

//behet lidhja
$conn = mysqli_connect($servername,$username,$password);

//kontrollon lidhjen

if(!$conn){
    die("Lidhja deshtoi" .mysqli_connect_error());

}

//krijon databasen

$sql = " CREATE DATABASE euro2024";

if(mysqli_query($conn,$sql)){
    echo "Databasa u krijua me sukses";
}
else{
    echo "Ndodhi nje problem me krijimin e databases" .mysql_error($conn);
}

mysqli_close($conn);

?>