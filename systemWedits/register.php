<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="registerstyle.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">	
<body>
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-5">
					<br><br><br><br>
								<p>Register</p><br>
					<form action="process/process.php" method="post" class="form1">
						<label class="fnametxt">First Name</label>
						<label class="mnametxt">Middle Name</label>
						<label class="lnametxt">Last Name</label>
						<br>


						<input type="text" id="fname" class="border border-secondary" name="firstname" required/><input type="text" class="border border-secondary" id="mname" name="midname" required/><input type="text" class="border border-secondary" id="lname" name="thirdname" required/>	
						<br>

						<label class="usernametxt">Username</label>
						<label class="TypeOfUser">Select type of user</label><br>
						<input type="text" class="border border-secondary" id="uname" name="username" required/>
						<select name="TypeOfUser" id="TypeOfUser" required/>
							<option value="Reporter">Reporter</option>
							<option value="Subscriber">Subscriber</option>
						</select><br>
						
						<label class="emailtxt">Email</label><br>
						<input type="email" class="border border-secondary" id="email" name="email" required/><br>
						<label class="pass">Password</label><label class="repass">Re-type password</label>
						<br>	
						<input type="Password" class="border border-secondary" id="pass" name="password1" required/>	
						<input type="Password" class="border border-secondary" id="pass" name="repassword" required/><br>

						<?php if (isset($_GET['error'])) {?>
							 <?php echo $_GET['error'].'<br>'; ?>
						<?php	} ?>

						<input type="submit" name="registerbtn" value="Sign up" class="submitbtn">
					</form>
					<form action="index.php" method="post">
						<input type="submit" name="submit" value="Already have an account?" class="AlrReg">
					</form>
				</div>
			</div>	
		</div>



</body>	
</html>