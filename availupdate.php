<!DOCTYPE html>
<html>
    <head>

        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <title>Welcome</title>
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
<body>
        
<?php

$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";

$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

//  $Idly = $_POST["V001"];	
//  echo $Idly;
// $PlainDosa = $_POST['Plain Dosa'];	
// $ChickenBriyani = $_POST['Chicken Briyani'];	
// $ChickenNoodles	= $_POST['Chicken Noodles'];
// $MuttonBriyani	= $_POST['MuttonBriyani'];
// $FriedRice = $_POST['FriedRice'];	

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){ 
      $name=$row['foodid']; 
        if(isset($_POST[$name])){
        // echo "$name\n";
            $upd = "UPDATE menu SET availability='y' WHERE foodid='$name'";
            if (!mysqli_query($conn, $upd))
              echo "<h2>Error in updating values in table</h2>".$upd."<br>".mysqli_error($conn);

            // $res4 = mysqli_query($conn, $upd); 
        }
        else{
          $upd = "UPDATE menu SET availability='n' WHERE foodid='$name'";
          if (!mysqli_query($conn, $upd))
             echo "<h2>Error in updating values in table</h2>".$upd."<br>".mysqli_error($conn);
        }

          // $res4 = mysqli_query($conn, $upd); 
    
    //    if($_POST['name']=$name){
    //      if(echo "checkbox.checked=='TRUE'";){
    //        echo "button selected\n";
    //      }
    //      else{
    //        echo "not selected";
    //      }
    //      }
  }
  
}

?>

<h3>Menu is updated successfully</h3>
<button class = "button btn" onclick = "document.location='adminpage.html'">Back</button>

</body>
</html>
