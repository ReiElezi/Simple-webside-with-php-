<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}
include('/laragon/www/atc_project/connectWithDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for adding a new user
    $name = $_POST['name'];
    $descrption = $_POST['descrption'];
    $price = $_POST['price'];
    $img = $_POST['image_url']; // You should hash the password before storing it in the database
    $category = $_POST['category'];
    // Insert new user into the database
    $insert_sql = "INSERT INTO products (name, description, price, image_url, category) VALUES ('$name', '$descrption', '$price', '$img', '$category')";
    
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
    <title>Add New Product</title>
</head>
<body>
    <h2>Add New Product</h2>

    <form action="add_products.php" method="post">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required>

    <br><br>

    <label for="describe">Describe your product:</label>
    <input type="text" name="descrption" required>
    <br><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <br><br>

        <label for="image_url">Image:</label>
        <input type="text" name="image_url" required>
        <br><br>

        <label for="category">Category:</label>
        <input type="text" name="category" required>
        <br><br>

        <input type="submit" value="Add Product">
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
