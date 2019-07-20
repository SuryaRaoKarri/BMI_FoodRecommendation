
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodrecommendation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else echo 'connected';

$sql = "SELECT * FROM items";
$result = $conn->query($sql);
echo '<br>';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "name: " . $row["itemname"]. "  type :" . $row["type1"]. " " . $row["type2"]. "<br>";
    }
} 
$conn->close();
