<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Login
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1"> 
        <link rel="stylesheet" href="styles.css"/>
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body style="font-family:cursive;">
        <div style="box-sizing:border-box;"></div>
        <ul> 
            <li style="border-left: 1px solid black;float: right;"><a class = "active" href="#">Admin Login</a></li>                   
    
            <li><a href="menu.php">Menu</a><li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="index.html">Home</a></li> 
            <p style="color:#bbb;margin-left:1%;margin-top:1%;float:left;font-size:22px;">Classic Kitchen</p>
        </ul>
    </div>
        <div>
            <div  class="formcontainer" style="font-size: 20px;padding:1%; margin: 5% 30% 10% 30%;">
                <form  method="post"  action="adminlogin.php">
                        <h2 style="text-align:center;font-family:cursive;color:black;">ADMIN LOGIN</h2>
                        <br>
                        <input type="text" placeholder="Enter your User ID." name="username" required><br><br>
                        <input type="password" placeholder = "Enter your Password." name="password" required><br><br>
                        <button type="submit" class="button btn">Login</button>
                </form>
            </div>
    
            <div style="float: bottom;color:#bbb; margin-left: -20px;font-family:cursive;margin-right: -20px; background-color: black; text-align: center; font-size: 20px;">
                <p>
                <a href = "#" class = "fa fa-google" style = "padding:2%;" ></a>classickitchen@gmail.com<br>
                <i class = "fa fa-phone icon" style = "padding:2%;"></i>044 - 12345678, 044 - 87654321<br>
            
                <!--<a href="mailto:classickitchenceg22@gmail.com">Email ID</a></p><br>-->
                <a href="https://twitter.com/login?lang=en" class="fa fa-twitter"></a>
                <a href="https://en-gb.facebook.com/" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/accounts/login/" class="fa fa-instagram"></a>
                <p>Designed and Developed by Tech Wizards.</p>
              </div>
          </div>

          <?php
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$servername = "localhost";
$username = "root";
$password = "Gokulmysql15!@#$";
$database = "srs";

		
		$conn = mysqli_connect($servername, $username, $password, $database);
		if(!$conn){
			echo "Not connected to the database";
		}
		
		$username = $_POST["username"];
		$pass = $_POST["password"];
		
		
		$sql8 = "SELECT * FROM admin WHERE uname = '$username' AND password = '$pass' ";
		$result = mysqli_query($conn,$sql8);
		
		if (mysqli_num_rows($result)){	
			header("Location:adminpage.html"); 	
		}
		else{
			echo "<h3 style='text-align:center;font-family: cursive;color: red;'>Access denied</h3>";
		}
	}
?>
    </body>
</html>