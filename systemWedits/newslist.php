<?php 
	session_start();

?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="newsliststyle.css">


</head>
<body>

	<!-- =============================== NAVBAR BOOTSTRAP =================================== -->
<nav class="navbar bg-info fixed-top" >
  <div class="container">
    <a class="navbar-brand text-large" href="zreporter.php">News Database</a>
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
            Welcome reporter:<br> <div class="text-info fw-bold"><?php echo $_SESSION['name']; ?></div>
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
	<div class="box">
		<table>
				<thead >
					<tr>
						<th class="id"> ID </th>
						<th >Headline</th>
						<th> News </th>
						<th> Date </th>
						<th>Reporter</th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody >
		<?php
						$file = fopen('process/news.csv', 'r');
						if($file != FALSE){
							while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
								echo '<tr >';
								echo '<td class="id">'.$data[0].'</td>';
								echo '<td class="headline">'.$data[4].'</td>';
								echo '<td class="news">'.$data[1].'</td>';
								echo '<td>'.$data[2].'</td>';//date
								echo '<td>'.$data[3].'</td>';//reporter
								echo '<td  class="action">
									<form action="process/process.php" method="post">
										<input type="hidden" name="id" value="'.$data[0].'" />
										<input class="deletebtn" type="submit" name="del" value="Delete" /><br>
										<input class="updatebtn" type="submit" name="upd" value="Update" />
									</form>
									</td>';
								echo '</tr>';
							}
							fclose($file);
						}
					?>
				</tbody>
				</table>
</div>

	



</div>




</body>
</html>

