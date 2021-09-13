<?php
	$author_name = "Erik Orgu";
	$weekday_names_et =["esmaspäev","teisipäev","kolmapäev","neljapäev","reede","laupäev","pühapäev"];
	$full_time_now = date("d.m.Y H:i:s");
	$hour_now = date("H");
		//echo ($hour_now + 3); //ajatsoon paigast ära
	$weekday_now = date("N");
		//echo $weekday_now;
	$day_category ="PÄEV";
		if ($weekday_now <= 5){
			$day_category = "TRENNIPÄEV";
	//	if ($hour_now < 9) {
	//		$part_of_day = "esimene trenn tehtud";
	//	if ($hour_now < 12) {
	//		$part_of_day = "teine trenn tehtud";
	//	if ($hour_now < 18) {
	//		$part_of_day = "kolmas trenn tehtud";
	//	if ($hour_now < 21) {
	//		$part_of_day = "neljas trenn tehtud";
		} else {
		$day_category = "PUHKEPÄEV";
		}
		
		//if($muutuja > 8 and $muutuja <= 18);
				//echo $day_category;
			
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
			$pic_file = $photo_files[$pic_num];
			$pic_html = '<img src="' .$photo_dir .$pic_file .'" alt="v2ikeErik" width="200">';
?>
<!doctype html>


<hmtl lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, toitumisnõustaja</title> 
	<style type="text/css">
	

	body {

		background-color: #FFB6C1;
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
	<p>Tseki kella: <i><span><?php echo $full_time_now; ?></span>.</p></i>
	<p>Eriku trennikalkulaator - täna on <u><span><?php echo $weekday_names_et [$weekday_now -1] ?></u> ja on <u><?php echo $day_category; ?></u></span><p>
	<p>Tseki ka mu <a href="https://www.erikorgu.ee">kodukat</a>.</p>
	<img src="photos/erik_main.jpg" alt="erik" width="300">
	
	<h2>Erikule maitseb</h2>
	<ul>
		<u>	
		<li>PORGAND</li>
		<img src="photos/porgand.jpg" alt="porgand" width="200">
		<li>MESI</li>
		<img src="photos/mesi.jpg" alt="mesi" width="200">
		<li>KRINGEL</li>	
		<img src="photos/kringel.jpg" alt="kringel" width="200">
		</u>
	</ul>




	<?php echo $pic_html; ?>

</body>
</html>


