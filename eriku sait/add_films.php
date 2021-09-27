<?php
	$author_name = "Erik Orgu";
	require_once("../../../../config.php");
	//echo $server_host;
	require_once("fnc_film.php");
	$film_store_notice = null;
	$title_submit = null;
	$year_submit = null;
	$duration_submit = null;
	$genre_submit = null;
	$studio_submit = null;
	$director_submit = null;
	
	

	$title_notice = null;
	$year_notice = null;
	$duration_notice = null;
	$genre_notice = null;
	$studio_notice = null;
	$director_notice = null;
	
	  //kas püütakse salvestada
    if(isset($_POST["film_submit"])){
        
        //kontrollin, et andmeid ikka sisestati
        if(!empty($_POST["title_input"]) and 
			!empty($_POST["year_input"]) and 
			!empty($_POST["duration_input"]) and
			!empty($_POST["genre_input"]) and 
			!empty($_POST["studio_input"]) and 
			!empty($_POST["director_input"])){
            
            $film_store_notice = store_film($_POST["title_input"], 
											$_POST["year_input"], 
											$_POST["duration_input"], 
											$_POST["genre_input"], 
											$_POST["studio_input"], 
											$_POST["director_input"]);
        } else {
            $film_store_notice = "Osa andmeid on puudu!";
        }
		
	
	}	
	
		 //üksikuna kui jama	

	
	if(isset($_POST["film_submit"])) {
		if(!empty($_POST["title_input"])) {
			
		$title_submit = $_POST["title_input"]; }
		
		else {
		
			$title_notice = "Palun täida lahter!";
			}
}

	if(isset($_POST["film_submit"])) {
		if(!empty($_POST["year_input"])) {
			
		$year_submit = $_POST["year_input"]; }
		
		else {
		
			$year_notice = "Palun täida lahter!";
			}
}
	if(isset($_POST["film_submit"])) {
		if(!empty($_POST["duration_input"])) {
			
		$duration_submit = $_POST["duration_input"]; }
		
		else {
		
			$duration_notice = "Palun täida lahter!";
			}
}
	if(isset($_POST["film_submit"])) {
		if(!empty($_POST["genre_input"])) {
			
		$genre_submit = $_POST["genre_input"]; }
		
		else {
		
			$genre_notice = "Palun täida lahter!";
			}
}
	if(isset($_POST["film_submit"])) {
		if(!empty($_POST["studio_input"])) {
			
		$studio_submit = $_POST["studio_input"]; }
		
		else {
		
			$studio_notice = "Palun täida lahter!";
			}
}
		
		if(isset($_POST["film_submit"])) {
		if(!empty($_POST["director_input"])) {
			
		$director_submit = $_POST["director_input"]; }
		
		else {
		
			$director_notice = "Palun täida lahter!";
			}
}
	
?>
<!doctype html>


<hmtl lang="et">
<head>
	<meta charset="utf-8">
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
	<h2>Eesti Filmide Lisamine Andmebaasi</h2>
	<hr>
	 <form method="POST">
        <label for="title_input">Filmi pealkiri</label>
        <input type="text" name="title_input" id="title_input" placeholder="Filmi pealkiri"
		value="<?php echo $title_submit; ?>">
		
		<span><?php if(empty($_POST["title_input"])) {echo $title_notice;} ?></span>
		
        <br> 
        <label for="year_input">Valmimisaasta</label>
        <input type="number" name="year_input" id="year_input" min="1912"
		value="<?php echo $year_submit; ?>">
		<span><?php if(empty($_POST["year_input"])) {echo $year_notice;} ?></span>
        <br>
        <label for="duration_input">Kestus</label>
        <input type="number" name="duration_input" id="duration_input" min="1" value="60" max="600"
		value="<?php echo $duration_submit; ?>">
		<span><?php if(empty($_POST["duration_input"])) {echo $duration_notice;} ?></span>
        <br>
        <label for="genre_input">Filmi žanr</label>
        <input type="text" name="genre_input" id="genre_input" placeholder="Zanr"
		value="<?php echo $genre_submit; ?>">
		<span><?php if(empty($_POST["genre_input"])) {echo $genre_notice;} ?></span>
        <br>
        <label for="studio_input">Filmi tootja</label>
        <input type="text" name="studio_input" id="studio_input" placeholder="Filmi tootja"
		value="<?php echo $studio_submit; ?>">
		<span><?php if(empty($_POST["studio_input"])) {echo $studio_notice;} ?></span>
        <br>
        <label for="director_input">Filmi režissöör</label>
        <input type="text" name="director_input" id="director_input" placeholder="Filmi režissöör"
		value="<?php echo $director_submit; ?>">
		<span><?php if(empty($_POST["director_input"])) {echo $director_notice;} ?></span>
        <br>
        <input type="submit" name="film_submit" value="Salvesta">
    </form>
    <span><?php echo $film_store_notice; ?></span>
</body>
</html>


