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
    <title>Student Login Form</title>
    <link rel="stylesheet" href="css/std_style.css">
</head>
 <body>
    <div class="wrapper">
        <header>
           <div class="logo">
               <img src="images/book.jpg">
           </div>
          <nav>
            <ul>
               <li><a href="index.php">HOME</a></li>
               <li><a href="books.php">BOOKS</a></li>
               <li><a href="admin.php">ADMIN_LOGIN</a></li>
               <li><a href="Registration.php">REGISTRATION</a></li>
               <li><a href="feedback.php">FEEDBACK</a></li>
               <!-- <li><a href="student.php">STUDENT-INFORMATION</a></li> -->
            </ul>
          </nav>
        </header>
        <section>
         <img style="height:460px;width: 1360px;" src="images/br2.webp">
          <div class="data">
              <form name="login" action="" method="post">
                <h1>LIBRARY MANAGEMENT SYSTEM</h1> <br>
                <h2>User Login Form</h2> <br>
                <div class="form2">
                 <input name="email" type="text" placeholder="username" required=""><br><br>
                 <input name="passw" type="password" placeholder="password" required=""><br><br>
                 <input style="width:100px;" type="submit" name="submit">
                </div>
              </form><br><br><br>
              <a href="" style="font-size:20px;color:rgb(247, 6, 206);">Forget password </a><span style="position:relative;left:100px;color:black">
                New For This Website ?<a href="Registration.php" style="color:red;font-size:20px;"> SignUp</a></span>

          </div>
      </section>
      </div> 
     <?php

      if(isset($_POST['submit']))
      { 
        $count=0;
        $res=mysqli_query($conn,"SELECT * FROM `admin` WHERE email='$_POST[email]' && passw='$_POST[passw]';");
        $row=mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);

        if($count==0)
        {
          ?>
          <script type="text/javascript"> 
               alert("username and password doesn't match");
               window.location="Registration.php";
           </script>
          <?php
        }
        else
        {

          $_SESSION['login_user'] = $_POST['email'];
          $_SESSION['pic'] = $raw['pic'];
          ?>
          <script type="text/javascript">
             window.location="index.php";
          </script>
         <?php
        }
      }
     ?>
</body>
</html>