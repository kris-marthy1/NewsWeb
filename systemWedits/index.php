<?php 
	session_start();
	if (isset($_POST['logoutbtn'])) {
		unset($_SESSION['name']);
		unset($_SESSION['type']);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
<script src="bootstrapbundle.js"> </script>
</head>
<body>	
	
		<div class="container">
			<div class="row">
				<div class="col-1"></div>
				<div class="col">
						<br><br><br><br><br><br><br>
						<p>Sign in</p>
						<form action="process/process.php" method="post" class="form1">
							<label for="user1" >Email or Username</label><br>
							<input type="text" id="user1" name="user" class="textbox border border-secondary" required>
							<br>
							<label for="pass1">Password</label><br>
							
							<input type="password" id="pass1" name="password" class="textbox border border-secondary" required/>
							<br>
							<br>
							<select name="TypeOfUser" class="textboxTOU border border-secondary"> 
								<option value="Subscriber" >Subscriber</option>
								<option value="Reporter">Reporter</option>
							</select>
							<br>
							<Br>
									<?php if (isset($_GET['errorlog'])) {?>
										
										<?php echo '<div class="error">'.$_GET['errorlog'].'</div ><br>'; ?>
										
									<?php	} ?>
									<?php if (isset($_GET['regged'])) {?>
										
										<?php echo '<div class="regged">'.$_GET['regged'].'</div ><br>'; ?>
										
									<?php	} ?>

							<input type="submit" name="login" value="Sign in" class="submitbtn" required/>
						</form>

						<form action="register.php" method="post">
							<br>
							<small>Don't have an account?</small><br>
							<input type="submit" name="submitlog" value="Register" class="reg">
						</form>
					
				</div>
				
			</div>


		</div>	
		
	
				
</body>
</html>