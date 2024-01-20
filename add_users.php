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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding a new user
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password']; // You should hash the password before storing it in the database
    $role = $_POST['role'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $insert_sql = "INSERT INTO users (firstName, lastName, email, password, role) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$role')";

    if (mysqli_query($conn, $insert_sql)) {
        echo "User added successfully!";
        // Redirect to dashboard after adding
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error adding new user: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
</head>
<body>
    <h2>Add New User</h2>

    <form action="add_users.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" required>
        <br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <label for="role">Role:</label>
        <input type="text" name="role" required>
        <br><br>

        <input type="submit" value="Add User">
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
