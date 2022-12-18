<?php 
	require('functions.php');
//=================== LOGIN PROCESS ==================================================
	if (isset($_POST['login'])) {
	// !!! ^this checks if login button button is clicked.
			$loginval = login($_POST['user'], $_POST['password'], $_POST['TypeOfUser']);
			// !!! ^$loginval runs the function login() with passed parameters and then assigns the values('user' or 'non-user') to $loginval.

			if ($loginval === 'user') {
		// !!! ^this condition checks if $loginval is 'user', if condition is met proceeds to the next condition.
				if ($_SESSION['type'] === 'Reporter') {			//===
																//===
					header('location: ..//zreporter.php');		//===
				} 												//====== These two if conditions checks the value of Session['type'] and 																 redirects the user according to the value of the Session['type']
				if ($_SESSION['type'] === 'Subscriber') {		//===
																//===
					header('location: ..//zsubscriber.php');	//===
				}												//===
			}

		else{
		// !!! ^if contidition is not  met, redirects  you to mainpage with get value errorlog.
			header("location: ..//index.php?errorlog=Credentials do not Match!");
		}
//=================== LOGIN PROCESS ==================================================	


//=================== REGISTER PROCESS ==================================================
	}// closing of isset login
	if (isset($_POST['registerbtn'])) {
	// !!! ^this checks if register button is clicked.

		if($_POST['password1'] !== $_POST['repassword']){
		// !!! ^this checks if password and retype passwords do not match. if condition is true, you will be redirected to the mainpage with a prompt.			
			header("location: ..//register.php?errorreg=Passwords do not Match!");
		}

		else{
		// !!! ^this if previous condition is not met, the class will be called and the program will run the method register().
			register();
	
			header("location: ..//index.php?regged=Successfully Registered!");

		}
	}
//=================== REGISTER PROCESS ==================================================

//=================== UPDATE DELETE PROCESS ==================================================
	// !!! if add button in zreporter is pressed ====================================================
	if (isset($_POST['addbtn'])) {
		addNews();
		header("location: ..//zreporter.php?news=Successfully Added!");
	}
	// !!! UPDATE PROCESS ==================================================================
	if(isset($_POST['upd'])){
		header('location: ..//update.php?id='.$_POST['id']);
	}

	
	if(isset($_POST['process_update'])){
		updateProcess();
		
		header('location: ..//newslist.php');
	}
	// DELETE ===================================================
	if(isset($_POST['del'])){
		deleteProcess();
		echo '<script type="text/javascript">
			alert("Successfuly Deleted!!!");
			window.location.href="..//newslist.php";
			</script>';
	}
//=================== UPDATE DELETE PROCESS ==================================================


//=================== REPLY PROCESS ==================================================
		
	
	// to add reply =======================
	if (isset($_POST['addReply'])) {
		addReply();
		header('location: ..//zsubscriber.php?reply=Comment successfully added!');
	}

 ?> 

