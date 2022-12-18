<?php 
session_start(); 
?>

 <!DOCTYPE html>
<html>
<head>
	<title> REPORTER VIEW</title>

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

		<style>
			body{
				font-family: 'Quicksand', sans-serif;

			}
			/* .addnewstxt{
			 	margin-left: 250px;
			 	font-weight: 1000;
			 	font-size: 35px;
			 }


			#editbtn{
				background: #efead8;
				margin-left: 1120px;
				border: 0px;
				border-radius: 50px;
				width: 200px;
				height: 60px;
				font-weight: bold;
				margin-bottom: -10px;
			}

			.box{
				font-family: 'Quicksand', sans-serif;
				border: 0px;
				border-radius: 50px;
				width: 1000px;
				height: 400px;
				margin-left: 210px;
				padding: 55px;
				background: #f4f4f4;
			}	
			.headlinetxt{
				font-size: 20px;
				font-weight: bold;
				margin-left: 15px;
			}
			

			.reporttxt{
				font-size: 20px;
				font-weight: bold;
				margin-left: 15px;	
			}


			

			


			*/
/*BOOOTSTRAPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP*/
			.text-large{
    font-size: 2rem;
}
.navbar a{
    font-size: 2rem;
}
.navbar a:hover{
    color: aqua;
}
.navbar form button{
    padding: 10px;
    width: 70%;
    margin: 0 auto;
    border: 2px solid  gray;
}

.form{
	background-color: #f4f4f4;
	border-radius: 45px;
	padding: 75px;

}
.all{
	margin-top: 1.3%;
}
.addnews{
	margin-bottom: 15px;
}
.editbtn{
	border-radius: 25px;
	background-color: #efead8;
	width: 100%;
}
.editbtn:hover{
	border: 1px solid #efead8;
}


/*input form*/
#headlineinput{
				width: 100%;
				border: 0px;
				border-radius: 35px;
				padding: 25px;

			}
			#freeform{
				width: 100%;
				border: 5px black solid;
				border-radius: 25px;
				padding: 30px;
				border: 0px;
			}
			#date{
				width: 40%;
				height: 2px;
				border: 0px;
				border-radius: 40px;
				padding: 35px;
			}
			.datereporter{
				margin-bottom: 15px;
			}
			#addbtn{
				width: 30%;
				padding: 15px;
				border: 0px;
				border-radius: 40px;
				background-color: #122c44;
				color: white;

			}
		</style>


<body>
	<!-- =============================== NAVBAR BOOTSTRAP =================================== -->
			<nav class="navbar bg-info fixed-top" >
			  <div class="container">
			    <a class="navbar-brand text-large" href="zreporter.php">Welcome to News Website!</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			      <div class="offcanvas-header">
			        <h5 class="offcanvas-title  text-large" id="offcanvasNavbarLabel">Menu</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			      </div>
			      <div class="offcanvas-body">
			        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
			          <li class="nav-item">
			            <a class="nav-link text-large" aria-current="page" href="zreporter.php">Home</a>
			            <hr>
			          </li>
			          <li class="nav-item text-large">
			            Welcome user:<br> <div class="text-info fw-bold"><?php echo $_SESSION['name']; ?></div>
			            <hr>
			          </li>
			        </ul>
			        <form class="d-flex mt-3" action="index.php">
			          <button class="btn btn-outline-light text-black text-large" type="submit">Logout</button>
			        </form>
			      </div>
			    </div>
			  </div>
			</nav>
			<br>
			<br>
			<br>
 <!-- =============================== NAVBAR BOOTSTRAP =================================== -->


<div class="container all">
 			<div class="d-flex justify-content-between addnews"> 
					<div class="col-3 fs-2 fw-bold">						
					Add news:
					</div>
					<div class="col-3 fs-2">
						<form action="newslist.php" method="POST">
							<input class ="btn editbtn fs-3" type="submit" name="update" value="Edit a news report  ?">	
						</form>
					</div>
 			</div>
			
			
			
			<div class="container form fs-4" >
				<?php 
				if (isset($_GET['news'])) {
									echo '<Br><h1>'. $_GET['news'].'<h1>';
								}
								 ?>
				<form action="process/process.php" method="POST">
					
				 	<label class="headlinetxt fs-3 fw-bold "> Headline:</label><br>
				 	<input type="text" name="headline" id="headlineinput" placeholder="Enter text here..." required><br>
				 	

				 	<label class="reporttxt fs-3 fw-bold"> Report:</label><br>
				 	<textarea id="freeform" name="news" rows="3" cols="40" placeholder="Enter text here..." required></textarea><br><br>

				 			<div class="fs-5 d-flex justify-content-between align-items-center">
				 			<span class="border border-dark rounded-5 p-3">
				 				
				 				Reporter:
						 	<?php 
								echo $_SESSION['name'];	
				 			?>				 				
				 			</span>
				 	
				 		<input type="date" name="date" id="date" required>
				 	

				 			</div>
				 	<br>
				 	<div class="d-flex justify-content-center">
 				 		<input type="submit" id="addbtn" name="addbtn" value="Add news" ><Br>
				 	</div>
				 </form>
				 <br>



				 	
			</div>	
</div>

</body>
</html>
