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

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $user = mysqli_fetch_assoc($result);
} else {
    // Redirect to dashboard if the user ID is not provided
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating user details
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $update_sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName', email = '$email', role = '$role' WHERE id = '$user_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "User details updated successfully!";
        // Redirect to dashboard after updating
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error updating user details: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>

    <form action="edit_user.php?id=<?php echo $user_id; ?>" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" value="<?php echo $user['firstName']; ?>" required>
        <br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" value="<?php echo $user['lastName']; ?>" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <br><br>

        <label for="role">Role:</label>
        <input type="text" name="role" value="<?php echo $user['role']; ?>" required>
        <br><br>

        <input type="submit" value="Update">
    </form>

    <!-- Add a link to go back to the dashboard -->
    <br><br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
