


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Kitchen</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

</head>
<body style = "font-family: cursive;">
    
        <div style="box-sizing:border-box;" class="card2">
            <ul >             
                <li><a href="admin.html">Admin</a></li>
                <li><a href = "yourorders.php">Your Orders</a></li>
               
                <li><a href="#" class = "active">Menu</a></li>
                <li><a href="#popular">Popular</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="index.html">Home</a></li>
                <p style="color:#bbb;margin-left:1%;margin-top: 1%;float:left;font-family:cursive;font-size:22px;">Classic Kitchen</p>
            </ul>
        </div>
        <div class="menu">
        <div class="heading">
            <h1>CLASSIC KITCHEN</h1>
            <h3>&mdash; MENU &mdash; </h3>
        </div>
        </div>

        <!-- <div style = "display: inline-block;" class="food-items"> -->
            <div class="menu">

                
        <?php

$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";


session_start();
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "SELECT * FROM menu where availability = 'y'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {


    echo "<div style = 'border: 2px solid red;'' class = 'food-items'>";
    echo "<img src='".$row['url']."' >";
    echo '<div class="details">';
        echo'<div class="details-sub">';

                   echo"<h5>".$row['name']."</h5>";
                   echo '<h5 class="price">Price(in Rs): '.$row["price"].'</h5>';
        echo "</div>";
                echo $row['details'];
                echo "<p style='color: black;' >Quantity: <form action = 'orders.php' method='post'><input style = 'width: 20%;' type= 'number' name = '$row[foodid]' min = 0 style='text-align:center'></p>";
                // echo "<button style='width: 30%;align-items: center;margin-bottom:1%; padding:2%' class = 'button btn' id = '.$row[foodid].'>Add to cart</button>";
                // echo "<span style = 'visibility: hidden;' id = '.$row[foodid].' >";
                // echo "<button id = 'minus'>-<button>";
                // echo "<form><input  id = '.$row[name].' value='0' type = 'text'></form>";
                // echo "<button id = 'plus'>+</button>";
                // echo "</span>";
    echo "</div>";
    echo "</div>";
        
  }
}
 else {
  echo "0 results";
}


?>



</div>

<br>
<button type = "submit" class = "button btn">Add to cart</button>
<div style="float: bottom;color:#bbb; margin-left: -20px;font-family:cursive;margin-right: -20px; background-color: black; text-align: center; font-size: 20px;">
            <p>
            <a href = "#" style = "padding:2%;" class = "fa fa-google" ></a>classickitchen@gmail.com<br>
            <i class = "fa fa-phone icon" style = "padding:2%;"></i>044 - 12345678, 044 - 87654321<br>
        
            <!--<a href="mailto:classickitchenceg22@gmail.com">Email ID</a></p><br>-->
            <a href="https://twitter.com/login?lang=en" class="fa fa-twitter"></a>
            <a href="https://en-gb.facebook.com/" class="fa fa-facebook"></a>
            <a href="https://www.instagram.com/accounts/login/" class="fa fa-instagram"></a>
            <p>Designed and Developed by Tech Wizards.</p>
          </div>
</body>
</html>



      