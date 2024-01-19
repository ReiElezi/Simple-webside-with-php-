<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";


// Create a database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve products from the database based on category
function getProductsByCategory($conn, $category) {
    $category = $conn->real_escape_string($category);
    $query = "SELECT * FROM products WHERE category = '$category'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

// Example: Get and display products in the 'others' category
$othersProducts = getProductsByCategory($conn, 'others');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body>
    <!-- Your HTML content here -->

    <div class="category others" id="categori">
        <div class="row">
            <?php foreach ($othersProducts as $product) : ?>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                        <div class="product-info">
                            <h5><?php echo $product['name']; ?></h5>
                            <h6>$<?php echo $product['price']; ?></h6>
                            <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Your other HTML content here -->

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>