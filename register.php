<?php
include('/laragon/www/atc_project/connectWithDB.php');

$fname = $_POST['signupFirstName'];
$lname = $_POST['signupLastName'];
$email = $_POST['signupEmail'];

$password = password_hash($_POST['signupPassword'],PASSWORD_DEFAULT );
$role =  $_POST['role'];

//inssert into users
$sql = "INSERT INTO users (firstName, lastName, email, password, role ) VALUES ('$fname',' $lname', '$email', '$password', '$role');";

if (mysqli_query($conn, $sql)) {
    header('Location: login.php');
} else {
    echo "error:" . $sql .  "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>