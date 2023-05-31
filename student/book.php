<?php
include "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
       .srch
       {
        padding-left:1000px;
       }
    </style>
</head>
<body>
    <!-- ______________________________search bar -->
    <form class="navbar-form" method="post" name="form1">
       <div class="srch">
           <input class="form-control" type="text" name="search" placeholder="search books..." required="">
           <button style="background-color:#6db6b9e6" type="submit" name="submit" value="submit" class="btn btn-default">
           <span class="glyphicon glyphicon-search"></span></button>
       </div>
    </form>
     <h2>List Of Books</h2>
     <?php
     if(isset($_POST['submit']))
  
      {
        $q=mysqli_query($conn,"SELECT * FROM books where name like '%$_POST[search]%';");

      if(mysqli_num_rows($q)==0)
      {
        echo "Sorry! No book found .";
      }
      else
     {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:white;'>";
      //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Book-Name"; echo "</th>";
        echo "<th>"; echo "Authors-Name"; echo "</th>";
        echo "<th>"; echo "Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Quantity"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";
      echo "</tr>";

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>"; 
           echo "<td>"; echo $row['bid']; echo "</td>";
           echo "<td>"; echo $row['name']; echo "</td>";
           echo "<td>"; echo $row['authors']; echo "</td>";
           echo "<td>"; echo $row['edition']; echo "</td>";
           echo "<td>"; echo $row['status']; echo "</td>";
           echo "<td>"; echo $row['quantity']; echo "</td>";
           echo "<td>"; echo $row["dep't"]; echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
     }
    }
    else
    {  
 
      $res=mysqli_query($conn,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:white;'>";
      //Table header
        echo "<th>"; echo "ID"; echo "</th>";
        echo "<th>"; echo "Book-Name"; echo "</th>";
        echo "<th>"; echo "Authors-Name"; echo "</th>";
        echo "<th>"; echo "Edition"; echo "</th>";
        echo "<th>"; echo "Status"; echo "</th>";
        echo "<th>"; echo "Quantity"; echo "</th>";
        echo "<th>"; echo "Department"; echo "</th>";
      echo "</tr>";

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>"; 
           echo "<td>"; echo $row['bid']; echo "</td>";
           echo "<td>"; echo $row['name']; echo "</td>";
           echo "<td>"; echo $row['authors']; echo "</td>";
           echo "<td>"; echo $row['edition']; echo "</td>";
           echo "<td>"; echo $row['status']; echo "</td>";
           echo "<td>"; echo $row['quantity']; echo "</td>";
           echo "<td>"; echo $row["dep't"]; echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    
     ?>
</body>
</html>