<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <title>Welcome</title>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        table {
  border-collapse: collapse;
  width: 50%;
  align-itmes: center;
  float: center;
  border: 4px outset #D6EEEE;
  border-radius: 5px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}
</style>

    </head>
    <body>
        <br><br><br>
        <center>
        <h2>Your Orders</h2><br><br>
        <table><tr><th>Food</th><th>Quantity</th><th>Price</th></tr>
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";



// Create connection
$conn = new mysqli($servername, $username, $password,$database);

$sql = "select * from menu where availability = 'y'";
$result = $conn->query($sql);
$sum=0;
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $id=$row['foodid'];
        $quantity=$_POST[$id];
        if($quantity>0){
        
            $x = $row['price']*$_POST[$id];
            $sql2 = "insert into orders values('$_SESSION[id]','$id','$row[name]','$_POST[$id]','$x')"; 
            $sum = $sum + $x;
            $result2 = $conn->query($sql2);   

            echo "<tr><td>".$row['name']."</td><td>".$quantity."</td><td>".$row['price']."</td></tr>";
           
        }
    }
}



echo "<tr><th style = 'text-align: center;'colspan='3'>Total Price: ".$sum."</th></tr></table>";
?>
<button class = "button btn" onclick = "document.location = 'index.html'">Pay Now</button>
<br>
<button onclick = "document.location = 'menu.php'" class = "button btn">Back</button>
</center>
</body>
</html>

