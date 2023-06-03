<?php 
include ("dbConnection.php");
include ("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
</head>
<body>
     <section>
      
       <div class="boxx">
         <h2>Welcome</h2>
        </div>
     </section>
   
   </div> 
   <?php
   if(isset($_SESSION['login_user']))
    {
        $sql="SELECT * FROM `Ctable`;";
        // if(mysqli_num_rows($q)==0)
        // {
        //     echo "Sorry! No any feedback found.";
        // }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    
    echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
            //Table header
            echo "<th>"; echo "Admin-Username";	echo "</th>";
            echo "<th>"; echo "comment";  echo "</th>";
        echo "</tr>";	
        
            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['comment']; echo "</td>";
            echo "</tr>";
        
    echo "</table>";
        }
     }
     else 
     {
         echo "0 results";
     }
    }
    else
    {
        ?>
        <script type="text/javascript">
          alert("you need to login first");
        </script>
        <?php
    }
      
   ?>
</body>
</html>