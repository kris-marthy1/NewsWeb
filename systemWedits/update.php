<h1>Update News</h1>
<?php
		$file = fopen('process/news.csv', 'r');
		if($file != FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
				if($data[0] == $_GET['id']){
					echo '
						<form action="process/process.php" method="post">
							<input type="hidden" name="id" placeholder="ID" value="'.$data[0].'"/>
							<Br>
							Headline:<br>
							<input type="Headline" name="header" placeholder="ID" value="'.$data[4].'"/>
							<Br>
							Report:<Br>
							<textarea  name="news" rows="4" cols="50" >'.$data[1].'</textarea><br>

							<input type="date" name="date" placeholder="date" value="'.$data[2].'" />
							<input type="submit" name="process_update" value="Update" />
						</form>
					';
				}
			}
			fclose($file);
		}
	?>
	<form action="newslist.php">
			<input type="submit" name="goback" value="Go back?">
		</form>
	