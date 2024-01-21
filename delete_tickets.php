<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

include('/laragon/www/atc_project/connectWithDB.php');

if (isset($_GET['id'])) {
    $tickets_id = $_GET['id'];

    // Delete user from the database
    $delete_sql = "DELETE FROM tickets_info WHERE id = '$tickets_id'";

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
