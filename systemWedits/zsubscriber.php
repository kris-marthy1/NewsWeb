<?php 
	require('process/functions.php');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Subscriber View</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="subscriber.css">
</head>
 <!-- =============================== NAVBAR BOOTSTRAP =================================== -->
<nav class="navbar bg-info fixed-top" >
  <div class="container">
    <a class="navbar-brand text-large" href="zsubscriber.php">Welcome to News Website!</a>
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
            <a class="nav-link text-large" aria-current="page" href="zsubscriber.php">Home</a>
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
<br>
<?php if (isset($_GET['reply'])) {?>
<div class="container reply text-large">
	<?php echo $_GET['reply'];?>
</div>

<?php } ?>
 <!-- =============================== NAVBAR BOOTSTRAP =================================== -->


      		<div class="container">
      			<div class="row">
	<?php 


                $file = fopen('process/news.csv', 'r');
                if($file != FALSE){
                    while(($data = fgetcsv($file, 1000, ',')) !== FALSE){

	?>
      				<div class="col-6">
      					<div class="box">
      						<img src="justin.png"><br>
      						<form action="newsview.php" method="post">
      							<?php echo '<button name="headline-toggle" value="'.$data[0].'">'.$data[4].'</button>';?>
   							</form>
      					</div>
 					
      				</div>
	<?php  
                    }
                }

	 ?>	
		
      			</div>	
      		</div>

</body>
</html>