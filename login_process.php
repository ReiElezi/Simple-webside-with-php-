<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

// select user from db 
$sql = "SELECT * FROM users WHERE email = '$email';";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        // verify pass
        if (password_verify($password, $row['password']) && ($row['role'] === 'admin')) {
            // start a session for this user
            session_start();
            // $_SESSION['email'] = $email;
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];

            // redirect to dashboard if user is admin
            header('Location: dashboard.php');
        } else {
            // redirect to index if user is not admin
            header('Location: home.php');
        }
    }
    if (password_verify($password, $row['password']) && ($row['role'] === 'user')) {
        // start a session for this user
        session_start();
        // $_SESSION['email'] = $email;
        if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
            // User is logged in, display their name and logout link
            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            echo " echo include('/laragon/www/atc_project/nav_logout.php'); ";
        } else {
            // User is not logged in, display regular navigation links along with a "Login" button
            echo include('/laragon/www/atc_project/navlogin.php');
        }
        // redirect to dashboard if user is admin
        header('Location: home.php');
    } 


} else {
    echo "User not found!";
}



mysqli_close($conn);