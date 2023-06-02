<?php 
include ("dbConnection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="css/fb.css">
</head>
<body>
   <div class="wrapper">
     <header>
        <div class="logo">
        </div>
         <?php
          if(isset($_SESSION['login_user']))
          {
            ?>
            <nav>
            <ul>
               <li><a href="index.php">HOME</a></li>
               <li><a href="books.php">BOOKS</a></li>
               <li><a href="logout.php">LOGOUT</a></li>
               <li><a href="profile.php">PROFILE</a></li>
               <li><a href="student.php">STUDENT-INFO</a></li>
               <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
          </nav>
           <?php
          }
          else
          {
            ?>
            <nav>
            <ul>
               <li><a href="index.php">HOME</a></li>
               <li><a href="books.php">BOOKS</a></li>
               <li><a href="admin.php">LOGIN</a></li>
               <li><a href="Registration.php">SIGN-UP</a></li>
               <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
          </nav>
          <?php
          }
         ?>
       <h1 style="color:wheat;font-size:20px">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
     </header>
     <section>
      
       <div class="boxx">
         <h2>If you have suggestions or questions,please comment below</h2>
       <form action="" method="post">
        <input id="h" type="textarea" name="comment" placeholder="say something ..." required="">
        <br><br><br><br>
        <input id="hh" type="submit" name="submit" value="Comment">
       </form>
        </div>
     </section>
   
   </div> 
   <?php
    if(isset($_POST['submit']))
    {
        $sql="INSERT INTO `Ctable` VALUES('','$_POST[comment]');";
       if(mysqli_query($conn,$sql))
       {
        ?>
        <script type="text/javascript">
          alert("Thank you for your comment");
        </script>
        <?php
       }
    }
   ?>
</body>
</html>