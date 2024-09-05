<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dvsmining";


// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Test connection
// else {
//    echo "<spam style='color:#000;'>Connected successfully</spam>";
//    echo "<br>";
// }

?>