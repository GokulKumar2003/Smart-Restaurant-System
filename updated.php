
<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <title>Edit Menu</title>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

<body>

<?php
$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";

		
		$conn = mysqli_connect($servername, $username, $password, $database);
		if(!$conn){
			echo "Not connected to the database";
		}

    $fid = $_POST["fid"];
    $newname = $_POST["newname"];
    $newprice = $_POST["newprice"];
    $newdet = $_POST["newdet"];
    $upd2 = "UPDATE menu SET name='$newname',price='$newprice',details='$newdet' WHERE foodid='$fid'";
    if (!mysqli_query($conn, $upd2))
          echo "<h2>Error in updating values in table</h2>".$upd2."<br>".mysqli_error($conn);
    else
        echo "Menu has been edited!!";
?>

<br>
<button onclick="document.location='adminpage.html'" class = "button btn" >Go Back</button>


    </body>
    </html>
