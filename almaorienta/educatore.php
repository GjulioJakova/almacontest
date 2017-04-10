<?php
include 'excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;
$excel->read('test.xls');

					
function sheetData($sheet){
	 		
	$corsi = array();
	$luoghi = array();
	$x = 1;
	while($x <= $sheet['numRows']){
		$y = 4;
		while($y <= $sheet['numCols']){
	      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
 		  if(isset($sheet['cells'][$x][$y]) && $sheet['cells'][$x][2] == "Educatore Professionale"){
			   $cellPrec = $sheet['cells'][$x][$y];
 			   array_push($luoghi,$cellPrec);
 		  }
		  $y++;

		}
 	    $x++;

	}
 
	$x = 1;
	$re = "<ul>";
	
	while($x <= $sheet['numRows']){
		$y = 4;
		while($y <= $sheet['numCols']){
	      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
		  if(isset($sheet['cells'][$x][$y]) && in_array($cell, $luoghi)){
			   $cellPrec = $sheet['cells'][$x][2];
			   $url = $sheet['cells'][$x][3];
			   $str ="<li><a href='$url'>$cellPrec</a></li>";
			   if (!in_array($str, $corsi) && $cellPrec != "Educatore Professionale") {
					array_push($corsi,$str);
			   }
  		  }
		  $y++;

		}
 	    $x++;

	}
	
	foreach($corsi as $value) {
		$re .= "$value"; ;
	}
	$re .= "</ul>";

	return $re ;

} 

   $excel_data =  sheetData($excel->sheets[0]);  
   
?>

<!DOCTYPE HTML>
 
<html lang="it">
	<head>
		<title>Alma Orienta</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
 		<link rel="stylesheet" href="assets/css/main.css" />
  	<style>
		.follow{
			margin: 0 auto !important;
		}
		h2{
			padding: 1%;
			margin: 1%;
		}
		ul {
			list-style-type: square;
		}
		#butt1{
		 width: 30%;
		 float: left;
	 }
	 
	 #butt2{
		 width: 30%;
		 float: center;
	 }
	 
	 #butt3{
	 	 width: 30%;
 		 float:right;
	 } 
	 
	  @media screen and (max-width: 480px) {
 
		.rounded {
		display: block;
		margin: 1%;
		}
		
		#butt1,#butt2,#butt3{
			float: none;
			width: 100%;
		}
	</style>
	</head>
	<body>
	
    <img class="img" src="images/uniboTrain1.jpg" alt="Train" />
	<div class="intro">
  	    <h1>UniBo Orient Express</h1>
     </div>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="">Scuola di Agraria e Medicina veterinaria </a></li>
							<li><a href="">Scuola di Economia, Management e Statistica</a></li>
							<li><a href="">Scuola di Farmacia, Biotecnologie e Scienze motorie</a></li>
							<li><a href="giurisprudenza.html">Scuola di Giurisprudenza </a></li>
							<li><a href="">Scuola di Ingegneria e Architettura </a></li>
							<li><a href="">Scuola di Lettere e Beni culturali </a></li>
							<li><a href="">Scuola di Lingue e Letterature, Traduzione e Interpretazione</a></li>
							<li><a href="medicina.html">Scuola di Medicina e Chirurgia</a></li>
							<li><a href="">Scuola di Psicologia e Scienze della Formazione</a></li>
							<li><a href="">Scuola di Scienze</a></li>
							<li><a href="">Scuola di Scienze Politiche</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<section class="sect">
					  <header class="section_header">Corso di Educatore professionale </header>
<h3>Definizione</h3>
<p>Operatore sociale e sanitario che opera all’interno di un’equipe multiprofessionale, nell’ambito di un progetto terapeutico 
volto ad uno sviluppo equilibrato della personalità con obiettivi educativi o relazionali in un contesto di partecipazione e recupero alla vita quotidiana.</p>
<h3>Funzioni</h3>
<ul>
	<li>Programma, gestisce e verifica interventi educativi mirati al recupero e allo sviluppo delle potenzialità dei soggetti in difficoltà, 
	per il raggiungimento di livelli sempre più “avanzati” di autonomia</li>
	<li>Cura il positivo inserimento psico-sociale dei soggetti in difficoltà</li>
	<li>Contribuisce a promuovere e organizzare strutture e risorse sociali e sanitarie, al fine di realizzare il progetto educativo integrato</li>
</ul>
 
 
<h3>Sbocchi lavorativi</h3>
<ul>
	<li>Ospedali pubblici e privati</li>
	<li>Università </li>
	<li>Cooperative sociali </li>
	<li>Servizi di assistenza alla persona</li>
	<li>Istituti geriatrici</li>
	<li>Strutture di riabilitazione</li>
	<li>Residenze sanitarie assistenziali</li>
	<li>Libere professione</li>
</ul>
 
 <h3>Corsi che ti potrebbero interessare</h3>
 <p><?php
	// displays select option with excel file data
	echo $excel_data;
?>  
</p>

 <h3>Contatta tutor del corso</h3>
 <p><strong>Mario Rossi</strong> : mario.rossi@unibo.it</p>

<button class="rounded" id="butt1" onclick="location.href='http://corsi.unibo.it/educazioneprofessionale/Pagine/default.aspx'">Collegamento sito</button>
<button class="rounded" id="butt2" onclick="location.href='test_ammissione.html'">Test d'ammissione</button>
<button class="rounded" id="butt3"  onclick="location.href=''">Piano didattico</button>

 </section>
			<!-- Footer -->
					<footer id="footer">
				
						<div class="inner">
							<section class="follow">
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li>
							</ul>
						</div>
						
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
 
	</body>
</html>