<html>
    <head>
        <title>
            Welcome
</title>
        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <br><br><br>
    <div class = "formcontainer">
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
//echo "Connected successfully";
// Start the session
session_start();

$_SESSION["Name"] = $_POST["name"];
$_SESSION["Email"] = $_POST["email"];

$Name = $_POST["name"];
$Email = $_POST["email"];

$sql2 = "INSERT INTO customers (Name, Email) VALUES ('$Name','$Email')";
			
			if(mysqli_query($conn, $sql2)){
            
                echo "Welcome ".$Name;
                echo "<br>You can now start ordering the food!.";
                echo "<br><br>Click the below button to go to the Menu Page.";
			}
			
			else{
				echo "not inserted in table".mysqli_error($conn);
			}

            $_SESSION["id"] = mysqli_insert_id($conn);

            ?>
            <br>
            <button class = 'button btn' onclick = 'document.location = "menu.php"'>Go to Menu Page</button>
        </div>
</body>
</html>

