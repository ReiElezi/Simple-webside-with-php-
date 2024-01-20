
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
    <?php include('/laragon/www/atc_project/components/nav.php'); ?>

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

    <div class="category others" id="categori">
        <div class="row">
            <!-- <div class="container"> -->
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img class="img2" src="img/alb.flag.png" alt="flamur">
                    <div class="product-info">
                        <h5>Qeleshe</h5>
                        <h6>$20</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/qeleshe.jpeg" alt="flamur">
                    <div class="product-info">
                        <h5>Qeleshe</h5>
                        <h6>$20</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/kapele.jpg" alt="flamur">
                    <div class="product-info">
                        <h5>Kapele</h5>
                        <h6>$5</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img style="height: 180px;" src="img/ss.png" alt="flamur">
                    <div class="product-info">
                        <h5>Kopsa</h5>
                        <h6>$3</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/shall.jpeg" alt="flamur">
                    <div class="product-info">
                        <h5>Shall kuq e zi</h5>
                        <h6>$12</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/stamp.jpeg" alt="flamur">
                    <div class="product-info">
                        <h5>Stampa</h5>
                        <h6>$8</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img style="height: 180px;" src="img/ss.png" alt="flamur">
                    <div class="product-info">
                        <h5>Kopsa</h5>
                        <h6>$3</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/shall.jpeg" alt="flamur">
                    <div class="product-info">
                        <h5>Shall kuq e zi</h5>
                        <h6>$12</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                <div class="product position-relative">
                    <img src="img/stamp.jpeg" alt="flamur">
                    <div class="product-info">
                        <h5>Stampa</h5>
                        <h6>$8</h6>
                        <button class="btn btn-dark" onclick="buyOthers()">Buy Now</button>
                    </div>
                </div>
            </div>

            <!-- </div> -->
        </div>

    </div>


    <div class="category clothing" style="max-width: 1024px; margin: auto;">
        <div class="row">
            <!-- Products in 'Clothing' category -->
            <div class="row">
                <!-- Products in 'All' category -->
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/fanella.jpg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2016</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/bluz2.jpeg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2014</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark " onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/fanella.jpg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2016</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/bluz4.jpg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2017</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/bluz5.jpeg" alt="Product 1">
                        <div class="product-info">
                            <h5>Hodie me Shqiponje</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/bluz6.webp" alt="Product 1">
                        <div class="product-info">
                            <h5>Hodie i zi me Shqiponje</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/fanella.jpg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2016</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/qeleshe.jpeg" alt="Product 1">
                        <div class="product-info">
                            <h5>Qeleshe</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 d-flex justify-content-center">
                    <div class="product position-relative">
                        <img src="img/fanella.jpg" alt="Product 1">
                        <div class="product-info">
                            <h5>Fanella 2016</h5>
                            <h6>$50</h6>
                            <button class="btn btn-dark" onclick="toggleForm()">Buy Now</button>
                        </div>
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

            <footer class="footer">
                <div class="rei">
                    <p>&copy; 2023 YourWebsite.com</p>
                </div>
            </footer>
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
