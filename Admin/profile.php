<?php 
	include "dbConnection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #004528; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 			if(isset($_POST['submit1']))
 			{
 				?>
 				<script type="text/javascript">
 					window.location="edit.php"
 				</script>
 				<?php
			}
 				$q=mysqli_query($conn,"SELECT * FROM admin where username='$_SESSION[login_user]' ;");
			    $p=mysqli_query($conn,"SELECT pic FROM admin where username='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
                $row=mysqli_fetch_assoc($q);
			    $row2=mysqli_fetch_assoc($p);
				$pic = $row2['pic'];
 				echo "<div style='text-align: center'>
 				<img class='img-circle profile-img' height=110 width=120 src='images/" . $pic . " '>

 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['fname'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['lname'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> sex: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['sex'];
	 					echo "</td>";
	 				echo "</tr>";

					 echo "<tr>";
					 echo "<td>";
						 echo "<b> Contact: </b>";
					 echo "</td>";
					 echo "<td>";
						 echo $row['contact'];
					 echo "</td>";
				 echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['passw'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>