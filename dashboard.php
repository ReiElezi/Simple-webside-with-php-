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

if ((!$users) || (!$hotels) || (!$tickets) || (!$products)) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,500,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eoI6ipmBxpk+H6at3Bz8nsg+jjgY5bAsx9+5BxJ+44TftBQ8q4v+dyFLN8txI6MK" crossorigin="anonymous"></script>
    `
    <link rel="stylesheet" href="css/style_dashboard.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="mb-4 padding-top-5">Welcome to Dashboard, <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></h2>
            </div>
            <div class="col-md-4 text-right padding-top-5">
                <h2 class="mb-4  "><a id="button" class='btn btn-outline-danger' href="logout.php">Logout</a></h2>
            </div>
        </div>
        </h2>
        <hr>

        <h3 class="text-center">All Users | <a href="add_users.php" class="material-symbols-outlined">&#xe7fe;</a></h3>
        <!-- Display user data in a table -->
        <table class="table table-bordered">
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
                <?php while ($row = mysqli_fetch_assoc($users)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><a class="" href="edit_users.php?id=<?php echo $row['id']; ?>">
                                <?php include('/laragon/www/atc_project/components/pen_black.php'); ?>
                            </a></td>
                        <td><a class="material-symbols-outlined" href="delete_users.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                                <?php include('/laragon/www/atc_project/components/trash.php'); ?></a></td>
                        <!-- Add more columns if needed -->
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <!-- *******************************tickets************************************ -->

        <h3 class="  text-center">All Tickets | <a class="material-symbols-outlined" href="add_tickets.php">&#xe147;</a></h3>
        <!-- Display Course data in a table -->
        <table class="table table-bordered">
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
                <?php while ($row = mysqli_fetch_assoc($tickets)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a class="material-symbols-outlined" href="edit_tickets.php?id=<?php echo $row['id']; ?>">
                                <?php include('/laragon/www/atc_project/components/pen_black.php'); ?>
                            </a></td>
                        <td><a class="material-symbols-outlined" href="delete_tickets.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this ticket?')">
                                <?php include('/laragon/www/atc_project/components/trash.php'); ?></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <!-- *******************************hotels************************************ -->

        <h3 class="text-center">All Hotels | <a class="material-symbols-outlined" href="add_hotels.php">&#xe147;</a></h3>
        <!-- Display hotels data in a table -->
        <table class="table table-bordered">
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
                <?php while ($row = mysqli_fetch_assoc($hotels)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><a class="material-symbols-outlined-red" href="edit_hotels.php?id=<?php echo $row['id']; ?>">
                                <?php include('/laragon/www/atc_project/components/pen_black.php'); ?></a></td>
                        <td><a class="material-symbols-outlined " href="delete_hotels.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                                <?php include('/laragon/www/atc_project/components/trash.php'); ?></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>


        <!-- ///////////////////////////// -->

        <h3 class="text-center">All Products | <a class="material-symbols-outlined" href="add_products.php">&#xe147;</a></h3>
        <!-- Display products data in a table -->
        <table class="table table-bordered">
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
                <?php while ($row = mysqli_fetch_assoc($products)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><a class="material-symbols-outlined-red" href="edit_products.php?id=<?php echo $row['id']; ?>">
                                <?php include('/laragon/www/atc_project/components/pen_black.php'); ?></a></td>
                        <td><a class="material-symbols-outlined " href="delete_products.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                                <?php include('/laragon/www/atc_project/components/trash.php'); ?>
                            </a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>