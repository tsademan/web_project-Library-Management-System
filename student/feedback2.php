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
    <style>
        .h1{
    position: absolute;
    left:390px;
    top:10px;
    width: 500px;
    height: 30px;
    text-align: center;
    font-weight:bold; 
}
#h{
    position: absolute;
    left:300px;
    top: 100px;
    width: 700px;
    height: 100px;
    text-align: center;
    font-weight:bold; 
}
#view-btn{
    position: absolute;
    left:700px;
    top:300px;
    width: 150px;
    height: 50px;
    text-align: center;
    font-weight:bold; 
}
.h{
    position: absolute;
    left:450px;
    top:300px;
    width: 150px;
    height: 50px;
    text-align: center;
    font-weight:bold; 
}
#view-btn:hover{
   background-color:green;
}
.h:hover{
   background-color:green;
}
    </style>
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
            <li><a href="feedback.php">FEEDBACK</a></li>
         </ul>
       </nav>
       <?php
        }
        else
        { ?>
          <nav>
          <ul>
             <li><a href="index.php">HOME</a></li>
             <li><a href="books.php">BOOKS</a></li>
             <li><a href="std_Login.php">LOGIN</a></li>
             <li><a href="Registration.php">SIGN-UP</a></li>
             <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
        </nav>
        <?php
           }
       ?>
       <h1 style="color:wheat">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
     </header>
     <section>
      
       <div class="boxx">
         <h2>Welcome</h2>
       <form action="" method="post">
        <input class="h1" type="text" name="username" placeholder="username"  required="">
        <input id="h" type="textarea" name="comment" placeholder="say something ..." required="">
        <br><br><br><br>
         <input class="h" type="submit" name="submit" value="Comment">
         <input id="view-btn" type="button" name="view" value="view">
       </form>
        </div>
        <script>
  var viewBtn = document.getElementById("view-btn");
  
  // Add a click event listener to the button
  viewBtn.addEventListener("click", function() {
    // Redirect to the new page
    window.location.href = "view.php";
     });
   </script>
     </section>
   
   </div> 
   <?php
    if(isset($_POST['submit']))
    {
        if(isset($_SESSION['login_user']))
        {
        $sql="INSERT INTO `Ctable` VALUES('','$_POST[username]','$_POST[comment]');";
       if(mysqli_query($conn,$sql))
       {
        ?>
        <script type="text/javascript">
          alert("Thank you for your comment");
        </script>
        <?php
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
    }
   ?>
</body>
</html>