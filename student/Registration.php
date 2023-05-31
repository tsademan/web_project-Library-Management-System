<?php
// include ("dbConnection.php")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "libmngmntsystem";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
    $fname =$_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $username = $_POST['username'];
    $sex =  $_POST['sex'];
    $email = $_POST['email'];
    $r_date=  $_POST['r_date'];
    $pass =$_POST['pass'];
    $count=0;
    $sql="SELECT email FROM `student`";
    $res =mysqli_query($conn,$sql);
  
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['email']==$_POST['email'])
      {
        $count=$count+1;
      }
    }
    if($count==0) { 
      mysqli_query($conn,"INSERT INTO `student` VALUES('$_POST[fname]','$_POST[lname]','$_POST[contact]','$_POST[username]',
      '$_POST[sex]','$_POST[email]','$_POST[r_date]','$_POST[pass]','p.jpg');");
      $conn->close();
      ?>
      <script type="text/javascript">
        alert("Registration Successful.");
      </script>
      <?php
      }
else{
  ?>
  <script type="text/javascript">
  alert("Warning: user name already exist.");
  </script>
  <?php         
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/reg_style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <header>
         
          <nav>
             <ul>
              <h1 id="h">LIBRARY MANAGEMENT SYSTEM</h1>
               <li><a href="index.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-home"> HOME</span></a></li>
               <li><a href="books.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-book"> BOOKS</span></a></li>
               <li><a href="std_Login.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
               <li><a href="index.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
               <li><a href="Registration.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
               <li><a href="feedback.php"><span style="word-spacing:0px;" class="glyphicon glyphicon-comment"> FEEDBACK</span></a></li>
            </ul> 
          </nav>
        </header>
        <section>
       
            <div id="dataa">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post"><br>
                <div class="form3">
                 <fieldset style="width:600px;height:430px;"><legend style="text-align:center;color: black;">User Registration Form</legend>
                 <input class="form-control" style="margin-bottom: 17px;" name="fname" type="text" placeholder="First Name" required="">

                 <input class="form-control" style="margin-bottom: 17px;" name="lname" type="text" placeholder="Last Name" required="">
 
                 <input class="form-control" style="margin-bottom: 17px;" name="contact" type="tel" placeholder="phone number">

                 <input class="form-control" style="margin-bottom: 17px;"  name="username" type="text" placeholder="username" required="">

                 <label for="sex">Male</label>
                 <input name="sex" type="radio" id="m" value="Male"  required="">
                 <label for="sex">Female</label>
                 <input  name="sex" type="radio" id="f" value="Female" required="">

                 <input class="form-control" style="margin-bottom: 17px;" name="email" type="email" placeholder="Email-Address" required="">
          
                 <input class="form-control" style="margin-bottom: 17px;" name="r_date" type="date" required="">
           
                 <input class="form-control" style="margin-bottom: 17px;" name="pass" type="password" placeholder="password" required="">
          
                 <legend>
                 
                 <button class="btn btn-default" id="btn1" name="submit">Sign Up</button>
                 <input class="btn btn-default" id="btn2"  type="reset" value="Clear">
                </legend>
                </fieldset>
                </div>
              </form>
            </div>
        </section>
    </div>
</body>
</html>