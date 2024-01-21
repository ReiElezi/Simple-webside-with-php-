<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}
include('/laragon/www/atc_project/connectWithDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating product details
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['image'];


    // Insert new user into the database
    $insert_sql = "INSERT INTO tickets_info (category, price, description, image) VALUES ('$category', '$price', '$description', '$img')";
    
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
    <title>Add New Ticket</title>
</head>
<body>
    <h2>Add New Ticket</h2>

    <form action="add_tickets.php" method="post">
    <label for="name">Ticket category:</label>
    <input type="text" name="category" required>

    <br><br>

    <label for="describe">Describe your Ticket:</label>
    <input type="text" name="descrption" required>
    <br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <br><br>

        <label for="image_url">Image:</label>
        <input type="text" name="image" required>
        <br><br>

       

        <input type="submit" value="Add Ticket">
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
