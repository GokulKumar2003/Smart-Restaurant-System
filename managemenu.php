
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="button.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content"0.5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "styles.css">
    <title>Chef login</title>
    <style>
        table,tr{
            border: 2px solid black;
            text-align: center;
        }
        .switch {
    position: relative;
    display: inline-block;
    width: 45px;
    height: 15px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: red;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 13px;
    width: 13px;
    left: 3px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .1s;
  }
  
  input:checked + .slider {
    background-color: darkgreen;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px darkgreen;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(28px);
    -ms-transform: translateX(28px);
    transform: translateX(28px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 20px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }

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
        // $sql1 = "SELECT * FROM vegmenu";
        $result = $conn->query($sql);
        // $result1= $conn->query($sql1);
        $a="color: red;";
        echo "<form method='post' action='availupdate.php'><table>";
        echo "<tr><th>FOOD ID</th>";
        echo "<th style = '<?php echo $a ;?>' > Name</th><th>Availability</th></tr>";
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){  
            $foodid=$row['foodid'];
            
            echo "<tr><td>".$row['foodid']."</td>";
            echo "<td>".$row['name']."</td>";
            if($row['availability']=='y')
            echo '<td><label class="switch" ><input type="checkbox" name = "'. $foodid.'" checked><span class="slider round"></span></label></td></tr>';
            else
            echo '<td><label class="switch" ><input type="checkbox" name = "'.$foodid.'"><span class="slider round"></span></label></td></tr>';

          }
        }
        // if ($result1->num_rows>0){
        //     while($row = $result1->fetch_assoc()){
        //         echo "<tr><td>".$row['FoodID']."</td>";
        //         echo "<td>".$row['Name']."</td></tr>";
        //     }
        // }
        echo "</table><input type='submit' class = 'button btn' value='Save changes'></input></form>";
?>
</body>
</html>
