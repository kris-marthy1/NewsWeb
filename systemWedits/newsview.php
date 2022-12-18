<?php
require('process/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>News</title>
	<link rel="stylesheet" type="text/css" href="newsview.css">
	 
<!--    <link rel="stylesheet" href="..//BOOTSTRAP5.2/bootstrap.css">
  <script src="..//BOOTSTRAP5.2/bootstrapbundle.js"></script>
 -->
 <link rel="stylesheet" type="text/css" href="bootstrap.css">
<script src="bootstrapbundle.js"> </script>
</head>
<body>
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
 <!-- =============================== NAVBAR BOOTSTRAP =================================== -->

		<div class="container">
			
<?php
                $file = fopen('process/news.csv', 'r');
                if($file != FALSE){
                    while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
                    	if ($_POST['headline-toggle'] === $data[0]) {
                    	?>
                    	 <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="box fs-3">
                            	<form action="zsubscriber.php"><button class="close">&times;</button></form>
                                <span class="headline">Headline:  <?php echo $data[4]; ?></span><br><br>
                                <p class="news">
                                    <?php echo $data[1]; ?>
                                </p><br>
                                <p class="text">
                                <span class="reporter"><strong>Date:</strong> <?php echo $data[2]; ?></span>
                                <span class="reporter"><strong>Reporter:</strong> <?php echo $data[3]; ?></span>
                                </p>
                                <?php 
                                    echo '  
                            <div class="rForm">                                                                                                 
                                <form action="process/process.php" method="post" >
                                    <input type="hidden" name="id" placeholder="ID" value="'.$data[4].'"/>
                                    <input type="hidden" name="name" placeholder="NAME" value=""/>
                                    <textarea type="text" rows="2"  name="reply"placeholder="Enter text here..." required></textarea>
                                    <input type="submit" name="addReply" class="addreply" value="Add a reply?">
                                </form>
                            </div>';
         ?>                     
                                <div class="reply">
                                    
                                    <strong >Comments:</strong>
                                        <?php displayReply($data[4]);?>
                                        
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    	<?php
                    	}
          ?>

               
        
        <?php
                    }
                    fclose($file);
                }
             ?>
		</div>
</body>
</html>