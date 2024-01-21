<?php
include('/laragon/www/atc_project/connectWithDB.php');

// Fetch tickets data from the database
$select_tickets_info = "SELECT id, category, price,image, description FROM tickets_info";
$tickets = mysqli_query($conn, $select_tickets_info);


if (!$tickets) {
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
    <?php include('/laragon/www/atc_project/components/nav.php'); ?>
    <div class="container content">
        <div class="row">
            <?php while ($ticket = mysqli_fetch_assoc($tickets)) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="category category-1 mt-5">
                        <!-- Category 1 content -->
                        <div class="image-container">
                            <img src="img/<?php echo $ticket['image']; ?>" alt="Category 1 Image">
                            <span id="span1s" class="vip-text"><?php echo $ticket['category']; ?></span>
                            <div id="" class="">Euro <?php echo $ticket['price']; ?></div>
                            <div id="" class=""><?php echo $ticket['description']; ?></div>
                        </div>
                        <button class="read-more-btn mt-3" onclick="toggleForm(<?php echo $ticket['id']; ?>)">
                            <span class="material-symbols-outlined">&#xe53f;</span>
                        </button>
                        <div id="ticketForm-<?php echo $ticket['id']; ?>" class="ticket-form">
                            <form action="ticket_order.php" method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Email</label>
                                    <input type="text" class="form-control" id="Email" name="Email">
                                </div>
                                <div class="form-group">
                                    <label for="creditCard">Credit Card</label>
                                    <input type="text" class="form-control" id="creditCard" name="creditCard">
                                </div>
                                <div class="form-group">
                                    <label for="numTickets">Number of Tickets</label>
                                    <input type="number" class="form-control" id="numTickets" name="numTickets">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2" id="getTicketBtn">Get your ticket</button>
                                <p id="ticketDetails" class="pstyle">Konfirmo bileten ne email</p>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <button class="toggle-map-button mb-4" onclick="toggleMap()">
        <span class="material-symbols-outlined">&#xeb90;</span>
        Stadiums in Germany
    </button>
    <div id="mapContainer" style="display: none;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d5137866.661916631!2d4.786568515517616!3d51.03971893382071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstadiums%20un%20germany!5e0!3m2!1sen!2s!4v1701532897466!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <?php include('/laragon/www/atc_project/components/footer.php'); ?>
</body>

</html>

<script>
    function toggleForm(categoryId) {
        var form = document.getElementById('ticketForm-' + categoryId);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }

    function toggleMap() {
        let mapContainer = document.getElementById('mapContainer');

        if (mapContainer.style.display === 'none') {
            mapContainer.style.display = 'block';
        } else {
            mapContainer.style.display = 'none';
        }
    }



    $("#getTicketBtn").click(function() {
        $("#ticketDetails").show();
    });
</script>