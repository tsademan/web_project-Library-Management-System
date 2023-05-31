<?php
include "dbConnection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="wrapper">
     <header>
        <div class="logo">
            <img src="images/book.jpg">
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
            <li><a href="Registration.php">SING-UP</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
         </ul>
       </nav>
           <?php
          }
          ?>
   
       <h1>LIBRARY MANAGEMENT SYSTEM</h1>
     </header>
     <section style="width: 300px;">
      <img style="height:460px;width: 1360px;" src="images/w.jpg"> 
      
      <?php
       if(isset($_SESSION['login_user']))
       { 
        $p=mysqli_query($conn,"SELECT pic FROM admin where username='$_SESSION[login_user]' ;");
        $row2=mysqli_fetch_assoc($p);
				$pic = $row2['pic'];
        echo "<img style='position:relative;top:-320px;left:1000px;width:200px;height:200px;' src='images/". $pic . "'>";
       echo "<br><span style='position:relative;top:-320px;left:1000px;font-size: 20px;color:green;
       font-weight: bold;'>Welcome</span><br><div style='color:white;font-size: 20px;position:relative;top:-320px;left:1000px;'>".$_SESSION['login_user']."</div>";
       }
      ?> 
     </section>
   
     <footer>
      <p>Email  : wtsadiku1@gmail.com</p>
      <p>Mobile : +251-919-672-597</p>
     </footer>
   </div> 
</body>
</html>