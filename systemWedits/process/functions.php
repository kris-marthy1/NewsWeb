<?php 
session_start();
// !!! IMPORTANT - this function register() gets values from forms and puts it into csv
		function register()
		{
			$names = array();
						$file = fopen('credentials.csv', 'r');
						if($file !== FALSE){
					 		while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
					 			$tempArray=array();
					 			foreach ($data as $val) {
					 					$tempArray[]= $val;
					 				}	
					 			$names[]= $tempArray;
					 		}			
							fclose($file);
						}
					$file = fopen('credentials.csv', 'w');
						$names[] = array($_POST['firstname'].' '.$_POST['midname'].' '.$_POST['thirdname'], $_POST['username'], $_POST['email'], $_POST['password1'], $_POST['TypeOfUser']);
					foreach ($names as $data) {
						fputcsv($file, $data);
					}
					fclose($file);
		}//function register() closing

		// !!! IMPORTANT - this function authenticates the user, takes in parameters of username,password, and type of user(subscriber or reporter) and compares it to the csv file and checks if you can login or not. It also assigns values to public variables and returns "$holder" which is the main basis if u have logged in or not. 
		function login($user1, $pass, $TypeOfUser){
			$holder='non-user';
			$name ='';
			$file = fopen('credentials.csv', 'r');
				if($file !== FALSE){
				while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
						if ($user1 === $data[1] or $user1 === $data[2]){
							if ($pass === $data[3] and $TypeOfUser === $data[4] ) {
								
							$holder ='user';
							$_SESSION['name'] = $data[0];
							$_SESSION['type'] = $data[4];
							}
						}

					}			
				fclose($file);
				}
			return $holder;

		}//function login() closing 
// !!! TO ADD NEWS =============================================
	
	function addNews(){
		$accounts = array();
		$file = fopen('news.csv', 'r');
		if($file !== FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
				$tempArray = array();
				foreach ($data as $key) {
					$tempArray[] = $key;
				}

				$accounts[] = $tempArray;

				}
			}
			fclose($file);
			//count's initial value is 0
			$count = count($accounts) +1;
			
				
		$file = fopen('news.csv', 'w');
		$accounts[] = array($count,$_POST['news'],$_POST['date'],$_SESSION['name'],$_POST['headline']);

		foreach ($accounts as $data) {
		 	fputcsv($file, $data);
		}

		fclose($file);
	}

	// !!! TO UPDATE NEWS ====================================
	function updateProcess(){
		$items = array();
		$file = fopen('news.csv', 'r');
		if($file !== FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
				$items[] = array($data[0], $data[1], $data[2],$data[3],$data[4]);
			}
			fclose($file);
		}

		$file = fopen('news.csv', 'w');

		foreach ($items as  $value) {
			if($_POST['id'] != $value[0]){
				fputcsv($file, $value);
			}
		}

		$updated_item = array();
		$updated_item[] = array($_POST['id'], $_POST['news'], $_POST['date'],$_SESSION['name'],$_POST['header']);

		foreach ($updated_item as  $value) {
			fputcsv($file, $value);
		}

		fclose($file);

	}//closing of updateProcess()

	// !!! TO DELETE NEWS ===============================
	function deleteProcess(){
		$items = array();
		$file = fopen('news.csv', 'r');
		if($file !== FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
				$items[] = array($data[0], $data[1], $data[2],$data[3],$data[4]);
			}
			fclose($file);
		}

		$file = fopen('news.csv', 'w');

		foreach ($items as  $value) {
			if($_POST['id'] != $value[0]){
				fputcsv($file, $value);
			}
		}

		fclose($file);
		//================== 
		// inogres the first data which isreassigns value for unique consecutive ID, 
		$accounts = array();

		$file = fopen('news.csv', 'r');
		if($file !== FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){

				$count = count($accounts)+1;
				$accounts[] = array($count,$data[1], $data[2],$data[3],$data[4]);
			}
			fclose($file);
		}
		print_r($accounts);

		$file = fopen('news.csv', 'w');

		foreach ($accounts as $data) {
			fputcsv($file, $data);
		}
		fclose($file);
	 }// !! CLOSING ==========================================


	  /// !!! to add reply 
	 function addReply(){
	 	$accounts = array();
		$file = fopen('reply.csv', 'r');
		if($file !== FALSE){
			while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
				$accounts[] = array($data[0], $data[1],$data[2]);
			}
			fclose($file);
		}

		$file = fopen('reply.csv', 'w');
		$accounts[] = array($_POST['id'], $_POST['reply'],$_SESSION['name']);

		foreach ($accounts as $data) {
			fputcsv($file, $data);
		}

		fclose($file);
	 }







	 /// !!! TO PRINT REPLIES
		 function displayReply($dataR){
		 	$file = fopen('process/reply.csv', 'r');
					if($file != FALSE){
						while(($data = fgetcsv($file, 1000, ',')) !== FALSE){
							if ($dataR === $data[0]) {
								echo '<div class="replybox">';
								echo $data[2].': ';
								echo $data[1].'<br>'.'<hr>';
								echo '</div>';
							}
						}
						fclose($file);
					}
		 }


?>