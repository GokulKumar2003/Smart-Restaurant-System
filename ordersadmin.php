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
        <h2>Customers Orders</h2><br><br>
        <table><tr><th>Customer ID</th><th>Food</th><th>Quantity</th></tr>
<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";



// Create connection
$conn = new mysqli($servername, $username, $password,$database);

$sql3 = "select * from orders order by custid desc";
$result3 = $conn->query($sql3);
if($result3->num_rows>0){
    while($row = $result3->fetch_assoc()){
        
            echo "<tr><td>".$row['custid']."</td><td>".$row['name']."</td><td>".$row['quantity']."</tr>";
           
        }
        
    }
?>
</table>
    <button onclick = "document.location = 'adminpage.html'" class = "button btn">Back</button>;
    </center>
    </body>
    </html>



