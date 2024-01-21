<?php
include('/laragon/www/atc_project/connectWithDB.php');

// Fetch tickets data from the database
$select_products= "SELECT id, name, description,price,image_url, category FROM products WHERE category = 'others'" ;
$products = mysqli_query($conn, $select_products);


if (!$products) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style4.1.css">
    <title>tifogrup2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;600&display=swap">

</head>

<body>
    


<?php include('/laragon/www/atc_project/components/nav.php') ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container justify-content-center">
       
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav text-white">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="showCategory('all')">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="showCategory('clothing')">Clothing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" onclick="showCategory('others')">Others</a>
                    </li>

                    <!-- Add more categories as needed -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="category all active">
            <div class="row">

                <!-- Products in 'All' category -->

                <img src="img/tifozaat.jpg" alt="" width="auto" height="500px">
            </div>

            <!-- Products -->


            <!-- Add more products here -->
        </div>
    </div>

    <div class="category others" id="<?php echo $product['category']; ?>">
        <div class="row">
        <?php while ($product = mysqli_fetch_assoc($products)) : ?>
            <!-- <div class="container"> -->
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img class="img2" src="img/<?php echo $product['image_url']; ?>" alt="flamur">
                    <div class="product-info">
                        <h5><?php echo $product['name']; ?></h5>
                        <h6> <?php echo $product['price']; ?></h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

 
            <!-- </div> -->
        </div>

    </div>


   <div class="category clothing" style="max-width: 1024px; margin: auto;">
    <div class="row">
        <?php
        $select_clothing_products = "SELECT id, name, description, price, image_url, category FROM products WHERE category = 'clothing'";
        $clothing_products = mysqli_query($conn, $select_clothing_products);

        if (!$clothing_products) {
            die("Error: " . mysqli_error($conn));
        }

        while ($product = mysqli_fetch_assoc($clothing_products)) :
        ?>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>">
                    <div class="product-info">
                        <h5><?php echo $product['name']; ?></h5>
                        <h6>$<?php echo $product['price']; ?></h6>
                        <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>  
                <!-- Add more categories as needed -->
            </div>

            <div id="buyNowForm" class="custom-alert">
                <div class="custom-alert-content">
                    <span class="close-btn" onclick="hideForm()">&times;</span>
                    <form>
                        <input type="text" class="form-control mb-2" placeholder="Name">
                        <input type="email" class="form-control mb-2" placeholder="Email">
                        <input type="number" class="form-control mb-2" placeholder="How many?">
                        <input type="text" class="form-control mb-2" placeholder="Adres">
                        <input type="number" class="form-control mb-2" placeholder="Credit card">
                        <div class="form-group">
                            <label for="size">Select Size:</label><br>
                            <input type="radio" id="xxl" name="size" value="XXL">
                            <label for="xxl">XXL</label>
                            <input type="radio" id="xl" name="size" value="XL">
                            <label for="xl">XL</label>
                            <input type="radio" id="l" name="size" value="L">
                            <label for="l">L</label>
                            <input type="radio" id="m" name="size" value="M">
                            <label for="m">M</label>
                            <input type="radio" id="s" name="size" value="S">
                            <label for="s">S</label>
                            <input type="radio" id="xs" name="size" value="XS">
                            <label for="xs">XS</label>
                            <input type="radio" id="xxs" name="size" value="XXS">
                            <label for="xxs">XXS</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>

            <div id="formaa" style="display: none;">
                <form>
                    <input type="text" class="form-control mb-2" placeholder="Name">
                    <input type="email" class="form-control mb-2" placeholder="Email">
                    <input type="number" class="form-control mb-2" placeholder="Quantity">
                    <!-- Other form fields as needed -->
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>

            <?php include('/laragon/www/atc_project/components/footer.php'); ?>

</body>

</html>
<script>

    function toggleForm() {
        const form = document.getElementById('buyNowForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
    function showForm() {
        document.getElementById('buyNowForm').style.display = 'flex';
    }

    function hideForm() {
        document.getElementById('buyNowForm').style.display = 'none';
    }

    //////Kjo forme nuk punon nuk e di pseeee
    //////Kjo forme nuk punon nuk e di pseeee
    function buyOthers() {
        const form = document.getElementById('formaa');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
    //////Kjo forme nuk punon nuk e di pseeee
    //////Kjo forme nuk punon nuk e di pseeee
    //////Kjo forme nuk punon nuk e di pseeee
    //////Kjo forme nuk punon nuk e di pseeee






    function showCategory(category) {
        // Hide all categories
        const categories = document.querySelectorAll('.category');
        categories.forEach(cat => {
            cat.classList.remove('active');
        });

        // Show the selected category
        const selectedCategory = document.querySelector(`.${category}`);
        selectedCategory.classList.add('active');

        // Hide products not belonging to the selected category
        const allProducts = document.querySelectorAll('.category p');
        allProducts.forEach(product => {
            if (product.parentElement.classList.contains(category) || category === 'all') {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }



</script>
