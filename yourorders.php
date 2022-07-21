<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Kitchen</title>
    <link rel="stylesheet" href="styles.css">
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "Gokulmysql15!@#$";
            $database = "srs";
            $con = new mysqli($servername, $username, $password,$database);
            
            if ($con->connect_error){
                die("Connection failed: " . $con->connect_error);
            }
            
            function myFunction($x,$y,$con) {
               if($y=='plus'){
                    $sql2="select Orders from temporders where foodid='$x'";
                    $result=$con->query($sql2);
                    $row=$result->fetch_assoc();
                    $row['quantity']++;
                    $sql2="update temporders set Orders= $row[quantity] where foodid='$x'";
                    $result=$con->query($sql2);
               }
               if($y=='minus'){
                $sql2="select Orders from temporders where foodid='$x'";
                $result=$con->query($sql2);
                $row=$result->fetch_assoc();
                $row['quantity']--;
                $sql2="update temporders set Orders= $row[quantity] where foodid='$x'";
                $result=$con->query($sql2);
               }
            }
            if (isset($_GET['name'])) {
                $x=$_GET['name'];
                $y=$_GET['opr'];
                myFunction($x,$y,$con);
            }
        mysqli_close($con);
        ?>
        <style>
            a:link, a:visited {
            background-color: black;
            color: white;
            padding: 15px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            }

            a:hover, a:active {
            background-color: gray;
            }
        </style>
</head>
<body style = "font-family: cursive;">
    
    <div style="box-sizing:border-box;" class="card2">
        <ul >             
            <li><a href="admin.html">Admin</a></li>
            <li><a href ="yourorders.php" class = "active">Your Orders</a></li>               
            <li><a href="Menu.php">Menu</a></li>
            <li><a href="popular.php">Popular</a></li>
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
    <?php include 'connect.php';?>   
    <?php
    session_start();

        $conn = new mysqli($servername, $username, $password,$database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $a='minus';
        $b='plus';
        $custid=$_SESSION['id'];
        $sql = "SELECT * FROM temporder where custid=$custid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<h3>".$row['name']." :</h3>";
                echo "<h3>Price : ".$row['price']."</h3>";
                echo "<input type= 'number' min = 0 style='text-align:center'><br><br>";
            }
        } 
        else {
            echo "0 results";
        }
        echo "<a href='FinalOrder.php'>Final Order</button>";
        $conn->close();
    ?>

</div>
</body>
</html>