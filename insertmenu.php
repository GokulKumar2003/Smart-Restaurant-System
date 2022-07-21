<html>
    <head>
        <title>
            Add menu
</title>
<link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>
        <?php

            $name = $_POST["name"];
            $id = $_POST["id"];
            $price = $_POST["price"];
            $time = $_POST["time"];
            $url = $_POST["url"];

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

$sql2 = "INSERT INTO menu VALUES ('$id','$name','$price','y','$time','$url')";
			
			if(mysqli_query($conn, $sql2)){
            
                echo "<h3>Food item is added successfully!</h3>";
			}
			
			else{
				echo "not inserted in table".mysqli_error($conn);
			}
?>

<button onclick = 'document.location="adminpage.html"' class = 'button btn'>Back</button>
