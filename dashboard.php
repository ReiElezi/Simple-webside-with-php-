<?php
session_start();

if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
    header('Location: login.php');
    exit();
}

include('/laragon/www/atc_project/connectWithDB.php');

// Fetch user data from the database
$select_users = "SELECT id, firstName, lastName, email, role FROM users";
$users = mysqli_query($conn, $select_users);

// Fetch tickets data from the database
$select_tickets_info = "SELECT id, category, price, description FROM tickets_info";
$tickets = mysqli_query($conn, $select_tickets_info);

// Fetch hotels data from the database
$select_hotels = "SELECT id, name, description, price, image_path FROM hotels";
$hotels = mysqli_query($conn, $select_hotels);

$select_products = "SELECT id, name, description, price,image_url, category FROM products";
$products = mysqli_query($conn, $select_products);

if ((!$users) || (!$hotels) || (!$tickets) || (!$products) ) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Dashboard, <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?> 
       <a href="logout.php"> | Logout</a>
    </h2>

    <h3>All Users | <a href="add_users.php">Add New User</a></h3>
    <!-- Display user data in a table -->
    <table border="1">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
                <!-- Add more columns if needed -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($users)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                    <td><a href="edit_users.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete_users.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                    <!-- Add more columns if needed -->
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- *******************************tickets************************************ -->

    <h3>All Tickets | <a href="add_ticket.php">Add New Ticket</a></h3>
    <!-- Display Course data in a table -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($tickets)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="edit_ticket.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete_ticket.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

     <!-- *******************************hotels************************************ -->

     <h3>All Hotels | <a href="add_hotels.php">Add New Hotels</a></h3>
    <!-- Display hotels data in a table -->
    <table border="1">
        <thead>
            <tr>
                <th>Hotels ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($hotels)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="edit_hotels.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete_hotels.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<!-- ///////////////////////////// -->

<h3>All Products | <a href="add_user.php">Add New products</a></h3>
    <!-- Display products data in a table -->
    <table border="1">
        <thead>
            <tr>
                <th> ID</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($products)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a href="edit_products.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="delete_products.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>