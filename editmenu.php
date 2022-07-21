
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="button.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href = "styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        table {
  border-collapse: collapse;
  width: 100%;
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
<body style = "font-family: cursive;">
    <br><br>
    <h2 style = "text-align: center;">Edit Menu</h2><br><br>
<form method="POST" class = "formcontainer">
    <p>Enter the food id : <input type="text" name="foodid" ></input></p><br>
    <button class = "button btn" type="submit">Submit</button>
</form>
</body>
</html>
<?php
		
		$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";

		
		$conn = mysqli_connect($servername, $username, $password, $database);
		if(!$conn){
			echo "Not connected to the database";
		}
		
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $fid = $_POST["foodid"];
        
        $sql = "SELECT * FROM menu WHERE foodid='$fid'";
        if (!mysqli_query($conn, $sql))
              echo "<h2>Error in selecting values from table</h2>".$sql."<br>".mysqli_error($conn);
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
                echo "<br><br><form  class = 'formcontainer' method='post' action='updated.php'>";
                echo "<table><tr><th>FOOD ID</th>";
                echo "<th> Name</th><th>Price</th><th>Details</th></tr>";
                echo "<tr><td><input type='text' value='".$row['foodid']."' name='fid' readonly></td>";
                echo "<td><input type = 'text' value='".$row['name']."' name='newname'></td>";
                echo "<td><input type='text' value='".$row['price']."' name='newprice'></td>";
                echo "<td><input type='text' value='".$row['details']."' name='newdet'></td></tr></table>";
                echo "<button class = 'button btn'>Submit</button>";
            
    }
?>
<br><br>
<button class = "button btn" onclick = "document.location = 'adminpage.html'">Back</button>
  </body>
  </html>
  




