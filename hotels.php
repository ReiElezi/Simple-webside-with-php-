<?php
include('/laragon/www/atc_project/connectWithDB.php');

// Fetch hotels data from the database
$select_hotels = "SELECT id, name, description, price, image_path FROM hotels ORDER BY price";
$hotels = mysqli_query($conn, $select_hotels);

if (!$hotels) {
    die("Error: " . mysqli_error($conn));
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;600&display=swap">
</head>

<body>
    <?php include('/laragon/www/atc_project/components/nav.php') ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">

            <h1>Welcome to Amazing Hotels</h1>
            <p>Find the perfect stay for your next vacation</p>
        </div>
    </section>

    <!-- Hotels Section -->
    <section id="hotels" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Fancy Hotels</h2>
            <div class="row">
                <!-- Hotel Cards -->
                <?php while ($hotel = mysqli_fetch_assoc($hotels)): ?>
                    <div class="col-md-4">
                    <div class="card hotel-card">
                        <img src="img/<?php echo $hotel['image_path']; ?>" class="card-img-top" alt="Hotel 1">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hotel['name']; ?></h5>
                            <p class="card-text"><?php echo $hotel['description']; ?></p>
                            <a href="#" class="btn btn-success">Book Now</a>
                            <span class="span1"><b><?php echo $hotel['price']; ?>€</b></span>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookingModalLabel">Booking Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="modalBody" class="modal-body">
                            <!-- Booking Form -->
                            <form>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="num">Guesses</label>
                                    <input type="number" class="form-control" id="num" placeholder="Hom many perssons? " required>
                                </div>
                                <!-- Add more form fields as needed -->
                                <button id="button1" class="btn btn-success"> <img class="img2" id="train" src="https://js.cx/clipart/train.gif"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center">
        <button id="showMapBtn" onclick="showMap()">Show Map</button>
    </div>

            <!-- Map Section with Close button (initially hidden) -->
            <div id="mapSection">
                <!-- Close button for the map -->
                <button id="closeMapBtn" onclick="closeMap()"> X </button>

                <!-- Google Maps embedded iframe -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2999846.397347832!2d7.305461075016049!3d51.13123998696305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shotels%20in%20Germany!5e0!3m2!1sen!2s!4v1703793352481!5m2!1sen!2s" width="100%" height="100%" style="border: 0;"></iframe>
            </div>
    <?php include('/laragon/www/atc_project/components/footer.php') ?>
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookNowButtons = document.querySelectorAll('.btn-success'); // Select all "Book Now" buttons

        bookNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('bookingModal');
                const modalInstance = new bootstrap.Modal(modal); // Create a Bootstrap modal instance
                modalInstance.show(); // Show the modal
            });
        });
    });


    function showMap() {
        // Get the map section element
        var mapSection = document.getElementById("mapSection");

        // Display the map section
        mapSection.style.display = "block";
    }

    function closeMap() {
        // Get the map section element
        var mapSection = document.getElementById("mapSection");

        // Hide the map section
        mapSection.style.display = "none";
    }

    train.onclick = function() {
        let start = Date.now();

        let timer = setInterval(function() {
            let timePassed = Date.now() - start;

            train.style.left = timePassed / 5 + 'px';

            if (timePassed > 1330) {
                clearInterval(timer);
                train.style.display = 'none';


                let newImage = document.createElement('img');
                newImage.src = 'img/tick.jpg';
                newImage.style.width = '100px';
                newImage.style.position = 'absolute';
                newImage.style.left = '50%';
                newImage.style.transform = 'translateX(-50%)';
                document.getElementById('modalBody').appendChild(newImage);


            }
        }, 20);
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Fetch hotel data from the PHP script
        fetch('get_hotels.php')
            .then(response => response.json())
            .then(data => {
                // Render hotel cards on the page
                const hotelsContainer = document.getElementById('hotels');
                data.forEach(hotel => {
                    const hotelCard = createHotelCard(hotel);
                    hotelsContainer.appendChild(hotelCard);
                });
            });
    });

    function createHotelCard(hotel) {
        const card = document.createElement('div');
        card.classList.add('col-md-4');

        card.innerHTML = `
                <div class="card hotel-card">
                    <img src="${hotel.image_path}" class="card-img-top" alt="${hotel.name}">
                    <div class="card-body">
                        <h5 class="card-title">${hotel.name}</h5>
                        <p class="card-text">${hotel.description}</p>
                        <a href="#" class="btn btn-success">Book Now</a>
                        <span class="span1"><b>${hotel.price}€</b></span>
                    </div>
                </div>
            `;

        return card;
    }
</script>