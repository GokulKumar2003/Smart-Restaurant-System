<?php
$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM image";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    echo "<img src='".$row['url']."' >";
  }
} else {
  echo "0 results";
}
$conn->close();
?>