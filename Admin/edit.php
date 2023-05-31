<?php
	include "navbar.php";
	include "dbConnection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($conn,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$username=$row['username'];
			$sex=$row['sex'];
			$contact=$row['contact'];
			$email=$row['email'];
			$passw=$row['passw'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<input class="form-control" type="file" name="file">

		<label><h4><b>First Name: </b></h4></label>
		<input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>">

		<label><h4><b>Last Name</b></h4></label>
		<input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>">

		<label><h4><b>Username</b></h4></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username; ?>">

		 <label for="sex">Male</label>
        <input  name="sex" type="radio" id="m" value="Male"  required="">
         <label for="sex">Female</label>
         <input  name="sex" type="radio" id="f" value="Female" required=""><br>

		<label><h4><b>Contact No</b></h4></label>
		<input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>">

		<label><h4><b>Email</b></h4></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email; ?>"> 

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="passw" value="<?php echo $passw; ?>">
		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$username=$_POST['username'];
			$sex=$_POST['sex'];
			$contact=$_POST['contact'];
			$email=$_POST['email'];
			$passw=$_POST['passw'];
			$pic=$_FILES['file']['name'];

			$sql1= "UPDATE admin SET pic='$pic', fname='$fname', lname='$lname', username='$username',sex='$sex', contact='$contact', email='$email', passw='$passw' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($conn,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>

