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
$fname = $_POST['signupFirstName'];
$lname = $_POST['signupLastName'];
$email = $_POST['signupEmail'];
$password = password_hash($_POST['signupPassword'],PASSWORD_DEFAULT );
$role =  $_POST['role'];

//inssert into users
$sql = "INSERT INTO users (firstName, lastName, email, password, role ) VALUES ('$fname',' $lname', '$email', '$password', '$role');";

if (mysqli_query($conn, $sql)) {

    header('Location: login.html');
} else {
    echo "error:" . $sql .  "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>