<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "euro2024";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// // Insert into users
// create an user for admin
$password = password_hash('admin', PASSWORD_DEFAULT); // hash password
$sql = "INSERT INTO users (firstName, lastName, email, password, role) VALUES ('Rei','Elezi' ,'rei@gmail.com', '$password', 'admin');";

// // -- Insert sample data into the 'products' table
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Qeleshe', 'Traditional Albanian hat', '20.00', 'qeleshe.jpeg', 'others');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Kapele', 'Another traditional item', '5.00', 'kapele.jpg', 'others');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Shall kuq e zi', 'Red and black scarf', '12.00', 'shall.jpeg', 'others');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Stampa', 'Traditional stamp', '8.00', 'stamp.jpeg', 'others');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Fanella 2016', 'Albanian flag t-shirt',' 50.00', 'fanella.jpg', 'clothing');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Fanella 2014', 'Another Albanian flag t-shirt', '50.00', 'bluz2.jpeg', 'clothing');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Fanella 2017', 'Yet another Albanian flag t-shirt', '50.00', 'bluz4.jpg', 'clothing');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Hodie me Shqiponje', 'Eagle hoodie', '50.00', 'bluz5.jpeg', 'clothing');";
$sql .= "INSERT INTO products (name, description, price, image_url, category) VALUES ('Hodie i zi me Shqiponje', 'Black hoodie with eagle', '50.00', 'bluz6.webp', 'clothing');";

$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hilton Frankfurt City Centre', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 500, 'hotel1.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hilton Garden Inn Frankfurt City Centre', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 300, 'hotel2.jpeg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hotel Name 3', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 850, 'hotel3.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hilton Mainz', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 600, 'hotel4.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Atlantis House', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 590, 'hotel5.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Cecilienhof, Potsdam', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 430, 'hotel6.jpeg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Dom-Hotel, Cologne', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 50, 'h7.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hotel Nassauer Hof', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 47, 'h8.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hotel Nikko Düsseldorf, Düsseldorf', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 100, 'h9.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Hotel Petersberg, Near Bonn', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 90, 'h7.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Zum Schwan', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 59, 'h8.jpg');";
$sql .= "INSERT INTO hotels (name, description, price, image_path) VALUES
('Schloss Elmau', 'Description of the hotel. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 99, 'h9.jpg');";

$sql .= "INSERT INTO tickets_info (category, price, description) VALUES ('Vip', 200.00, 'A1,A2 sector');";
$sql .= "INSERT INTO tickets_info (category, price, description) VALUES ('Normal', 100.00, 'B1,B2 sector');";
$sql .= "INSERT INTO tickets_info (category, price, description) VALUES ('Basic', 30.00, 'C1,C2,C3 sector');";

if (mysqli_multi_query($conn, $sql)) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}  

mysqli_close($conn);
?>