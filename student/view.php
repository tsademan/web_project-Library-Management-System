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
    $res=mysqli_query($conn,"SELECT * FROM `Ctable` ORDER BY `Ctable`.`id` DESC;");
    echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
            //Table header
            echo "<th>"; echo "Admin-Username";	echo "</th>";
            echo "<th>"; echo "comment";  echo "</th>";
        echo "</tr>";	

        while($row=mysqli_fetch_assoc($res))
        {
            echo "<tr>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['comment']; echo "</td>";
            echo "</tr>";
        }
    echo "</table>";
   ?>
</body>
</html>