
<?php
include "dbConnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
       .srch
       {
        padding-left:1000px;
        padding-top:130px;
       }
    </style>
    <link rel="stylesheet" href="css/s_style.css">
</head>
<body>  
    <header>
         <nav>
           <ul>
               <li><a href="index.php">HOME</a></li>
               <li><a href="books.php">BOOKS</a></li>
               <li><a href="admin.php">ADMIN_LOGIN</a></li>
               <li><a href="Registration.php">REGISTRATION</a></li>
               <li><a href="feedback.php">FEEDBACK</a></li>
               <li><a href="student.php">STUDENT-INFORMATION</a></li>
            </ul>
          </nav>
    </header>
    <!-- ______________________________search bar -->
    <div class="wrapper">
    <section>
    <form class="navbar-form" method="post" name="form1">
       <div class="srch">
           <input class="form-control" type="text" name="search" placeholder="search a student..." required="">
           <button style="background-color:#6db6b9e6" type="submit" name="submit" value="submit" class="btn btn-default">
           <span class="glyphicon glyphicon-search"></span></button>
       </div>
    </form>
     <h2>List Of Students</h2>
     <?php
     if(isset($_POST['submit']))
  
      {
        $q=mysqli_query($conn,"SELECT fname,lname,contact,age,sex,email,r_date FROM `student2`
         where fname like '%$_POST[search]%';");

      if(mysqli_num_rows($q)==0)
      {
        echo "Sorry! No student found with that name .";
      }
      else
     {
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:white;'>";
      //Table header
        echo "<th>"; echo "First-Name"; echo "</th>";
        echo "<th>"; echo "Last-Name"; echo "</th>";
        echo "<th>"; echo "Contact"; echo "</th>";
        echo "<th>"; echo "Age"; echo "</th>";
        echo "<th>"; echo "Sex"; echo "</th>";
        echo "<th>"; echo "email"; echo "</th>";
        echo "<th>"; echo "Reg-Date"; echo "</th>";
      echo "</tr>";

      while($row=mysqli_fetch_assoc($q))
      {
        echo "<tr>";
           echo "<td>"; echo $row['fname']; echo "</td>";
           echo "<td>"; echo $row['lname']; echo "</td>";
           echo "<td>"; echo $row['contact']; echo "</td>";
           echo "<td>"; echo $row['age']; echo "</td>";
           echo "<td>"; echo $row['sex']; echo "</td>";
           echo "<td>"; echo $row['email']; echo "</td>";
           echo "<td>"; echo $row['r_date']; echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
     }
    }
    else
    {  
 
      $res=mysqli_query($conn,"SELECT fname,lname,contact,age,sex,email,r_date FROM `student2`");
      echo "<table class='table table-bordered table-hover'>";
      echo "<tr style='background-color:white;'>";
      //Table header
      echo "<th>"; echo "First-Name"; echo "</th>";
      echo "<th>"; echo "Last-Name"; echo "</th>";
      echo "<th>"; echo "Contact"; echo "</th>";
      echo "<th>"; echo "Age"; echo "</th>";
      echo "<th>"; echo "Sex"; echo "</th>";
      echo "<th>"; echo "email"; echo "</th>";
      echo "<th>"; echo "Reg-Date"; echo "</th>";
    echo "</tr>";

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>"; 
           echo "<td>"; echo $row['fname']; echo "</td>";
           echo "<td>"; echo $row['lname']; echo "</td>";
           echo "<td>"; echo $row['contact']; echo "</td>";
           echo "<td>"; echo $row['age']; echo "</td>";
           echo "<td>"; echo $row['sex']; echo "</td>";
           echo "<td>"; echo $row['email']; echo "</td>";
           echo "<td>"; echo $row['r_date']; echo "</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    
     ?>
 </section>
  </div>
</body>
</html>