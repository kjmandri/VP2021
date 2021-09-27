<?php
	$author_name = "Erik Orgu";
	require_once("../../../../config.php");
	//echo $server_host;
	require_once("fnc_film.php");
	$films_html = null;
	$films_html = read_all_films();
	
	
?>
<!doctype html>


<hmtl lang="et">
<head>
	<meta charset="utf-8">
	<title><?php echo $author_name; ?>, veebiprogrammeerimine</title> 
	<style type="text/css">
	

	body {
		
		background-color: #FFE4E1;
		margin-left: 20%;
		margin-right: 20%;
		border: 4px dotted black;
 		padding: 10px 10px 10px 10px;
 		font-family: sans-serif;
		}	
		
	</style>
</head>
<body>
	<h1><?php echo $author_name; ?>, toitumisnõustaja</h1>
	<p><strong>Hei, siin <?php echo $author_name; ?>!</strong></p>
	<p>Tahtsin sulle midagi öelda...</p>
	<hr>
	<h2>Eesti Filmid</h2>
	<hr>
	
	<?php echo $films_html; ?>
	
	
	
	
</body>
</html>


