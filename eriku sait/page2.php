<?php
	$author_name = "Erik Orgu";
	$todays_evaluation = null;
	$inserted_adjective = null;
	$adjective_error = null;
	
	

	//kontrollin kas on klikitud submit nuppu
	if(isset($_POST["todays_adjective_input"])){
		//echo "Klikiti nuppu!";
		//kas midagi kirjutati ka
		if(!empty($_POST["adjective_input"])){
			$todays_evaluation = "<p>Sa ütlesid mulle <strong>" .$_POST["adjective_input"] ."</strong>.</p> \n <hr> \n";
			$inserted_adjective = $_POST["adjective_input"];
		} else {
			$adjective_error = "Palun";
		}
	}
	
	
			$pic_num = null;
			$photo_dir = "photos/";
			$allowed_photo_types = ["image/jpeg", "image/png"];
				//$all_files = scandir($photo_dir);
			$all_files = array_slice(scandir($photo_dir), 2);
				//echo $all_files; 	
				//var_dump ($all_files);
				//$only_files = array_slice($all_files, 2);
				//var_dump($only_files);
				
				//sõelun välja ainult lubatud pildid
				$photo_files = [];
				foreach($all_files as $file) {
					
					$file_info = getimagesize ($photo_dir .$file);
					if(isset($file_info["mime"])) {
						if(in_array($file_info ["mime"], $allowed_photo_types)){
						array_push($photo_files, $file);
											
						}	
					}		
				}
				
			$limit = count($photo_files);
				//echo $limit;
			$pic_num = mt_rand(0, $limit - 1);
			
			if(isset($_POST["photo_select_submit"])){
			$pic_num = $_POST["photo_select"];
			}
			
			
			$pic_file_html = null;
			$pic_file = $photo_files[$pic_num];
			$pic_html = '<img src="' .$photo_dir .$pic_file .'" alt="väikeErik" width="200">';
			
			$pic_file_html = "\n <p>".$pic_file ."</p> \n";
			
			//fotode nimekiri
			//<p>Valida on järgmised fotod:<strong>foto1.jpg</strong>, <strong>foto2.jpg</strong><p>
			
			$list_html = "<ul> \n";
	for($i = 0; $i < $limit; $i ++){
		$list_html .= "<li>" .$photo_files[$i] ."</li> \n";
	}
	$list_html .= "</ul>";
	
	$photo_select_html = '<select name="photo_select">' ."\n";
	for($i = 0; $i < $limit; $i ++){
		//<option value="0">fail.jpg</option>
		$photo_select_html .= "\t \t \t" .'<option value="' .$i .'"';
		if($i == $pic_num){
			$photo_select_html .= " selected";
		}
		$photo_select_html .= ">" .$photo_files[$i] ."</option> \n";
	}
	$photo_select_html .= "\t \t </select> \n";
?>
<!doctype html>


<hmtl lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, toitumisnõustaja</title> 
	<style type="text/css">
	

	body {
		
		background-color: #FFE4E1;
		margin-left: 20%;
		margin-right: 20%;
		border: 2px dotted black;
 		padding: 10px 10px 10px 10px;
 		font-family: sans-serif;
		}	
		
	</style>
</head>
<body>
	<h1><?php echo $author_name; ?>, toitumisnõustaja</h1>
	<p>Hei, siin <?php echo $author_name; ?>!</p>
	<p>Tahtsin sulle midagi öelda...</p>
	<p>Tseki ka mu <a href="https://www.erikorgu.ee" target="_blank">kodukat</a>.</p>
	<img src="photos/erik_main.jpg" alt="erik" width="300">
	<hr>
	<form method="POST">
		<input type="text" name="adjective_input" placeholder="Kirjelda mind :)"
		value="<?php echo $inserted_adjective; ?>">
		<input type="submit" name="todays_adjective_input" value="Salvesta">
		<span><?php echo $adjective_error; ?></span>
	</form>
	<hr>
	<h2>Erikule maitseb</h2>
	<ul>
		<u>	
		<li>PORGAND</li>		
		<li>MESI</li>
		<li>KRINGEL</li>	
		</u>
	</ul>


<?php
	echo $todays_evaluation;
	
	?>
	
<form method="POST">
		<?php echo $photo_select_html; ?>
		<input type="submit" name="photo_select_submit" value="Näita valitud fotot">
	</form>
	<?php
		echo $pic_html;
		echo $pic_file_html;
		echo "<hr> \n";
		echo $list_html;
	?>

</body>
</html>


