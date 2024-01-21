<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

include('/laragon/www/atc_project/connectWithDB.php');

if (isset($_GET['id'])) {
    $hotels_id = $_GET['id'];

    $sql = "SELECT * FROM hotels WHERE id = '$hotels_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $hotel = mysqli_fetch_assoc($result);
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
    $img = $_POST['image_path'];

    $update_sql = "UPDATE hotels SET name = '$name', description = '$description', price = '$price', image_path ='$img' WHERE id = '$hotels_id'";

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
    <title>Edit Hotels</title>
</head>

<body>
    <h2>Edit Hotels</h2>

    <form action="edit_hotels.php?id=<?php echo $hotels_id; ?>" method="post">
        <label for="text">Hotel Name:</label>
        <input type="text" name="name" value="<?php echo $hotel['name']; ?>" required>
        <br><br>

        <label for="text">Description:</label>
        <input type="text" name="description" value="<?php echo $hotel['description']; ?>" required>
        <br><br>

        <label for="text">Price:</label>
        <input type="text" name="price" value="<?php echo $hotel['price']; ?>" required>
        <br><br>

        <label for="img">Image:</label>
        <input type="text" name="image_path" value="<?php echo $hotel['image_path']; ?>" required>
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