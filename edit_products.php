<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

include('/laragon/www/atc_project/connectWithDB.php');

if (isset($_GET['id'])) {
    $products_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = '$products_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $product = mysqli_fetch_assoc($result);
} else {
    // Redirect to dashboard if the product ID is not provided
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating product details
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $img = $_POST['image_url'];
    $category = $_POST['category'];

    $update_sql = "UPDATE products SET name = '$name', description = '$description', price = '$price', image_url = '$img', category='$category' WHERE id = '$products_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "Product details updated successfully!";
        // Redirect to dashboard after updating
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error updating product details: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
<body>
    <h2>Edit Product</h2>

    <form action="edit_products.php?id=<?php echo $products_id; ?>" method="post">
        <label for="text">Product Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        <br><br>

        <label for="text">Description:</label>
        <input type="text" name="description" value="<?php echo $product['description']; ?>" required>
        <br><br>

        <label for="text">Price:</label>
        <input type="text" name="price" value="<?php echo $product['price']; ?>" required>
        <br><br>

        <label for="image">Image:</label>
        <input type="text" name="image_url" value="<?php echo $product['image_url']; ?>" required>
        <br><br>

        <label for="text">Category:</label>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
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
