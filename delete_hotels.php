<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $hotels_id = $_GET['id'];

    // Delete user from the database
    $delete_sql = "DELETE FROM hotels WHERE id = '$hotels_id'";

    if (mysqli_query($conn, $delete_sql)) {
        echo "User deleted successfully!";
        echo '<br><a href="dashboard.php">Back to Dashboard</a>';
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // Redirect to dashboard if the user ID is not provided
    header('Location: dashboard.php');
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
