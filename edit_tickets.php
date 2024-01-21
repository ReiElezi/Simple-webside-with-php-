<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

include('/laragon/www/atc_project/connectWithDB.php');

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    $sql = "SELECT * FROM tickets_info WHERE id = '$ticket_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $ticket = mysqli_fetch_assoc($result);
} else {
    // Redirect to dashboard if the product ID is not provided
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating product details
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $img = $_POST['image'];

    $update_sql = "UPDATE tickets_info SET category = '$category', price = '$price', description = '$description', image ='$img' WHERE id = '$ticket_id'";

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
    <title>Edit Tickets</title>
</head>

<body>
    <h2>Edit Ticket</h2>

    <form action="edit_tickets.php?id=<?php echo $ticket_id; ?>" method="post">
        <label for="text">Ticket Category:</label>
        <input type="text" name="category" value="<?php echo $ticket['category']; ?>" required>
        <br><br>

        <label for="text">Price:</label>
        <input type="text" name="price" value="<?php echo $ticket['price']; ?>" required>
        <br><br>

        <label for="text">Description:</label>
        <input type="text" name="description" value="<?php echo $ticket['description']; ?>" required>
        <br><br>

        <label for="img">Image:</label>
        <input type="text" name="image" value="<?php echo $ticket['image']; ?>" required>
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