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
 		  if(isset($sheet['cells'][$x][$y]) && $sheet['cells'][$x][2] == "Giurista d'impresa e delle amministrazioni pubbliche"){
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
			   if (!in_array($str, $corsi) && $cellPrec != "Giurista d'impresa e delle amministrazioni pubbliche") {
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
 
<html>
	<head>
		<title>Giurisprudenza </title>
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
					  <header class="section_header">Corso di Giurista d'impresa e delle amministrazioni pubbliche </header>
<h3>Definizione</h3>
<p>Professionista che tutela gli interessi di natura giuridica dell’impresa in cui opera, in tutti i campi del diritto che coinvolgono la vita aziendale.</p>
<h3>Funzioni</h3>
<ul>
	<li>Tradurre, in termini giuridici, le scelte di politica dell’impresa e valutare le conseguenze legali delle decisioni gestionali,
	nonché far applicare all’impresa le disposizioni legislative che impongono obblighi all’impresa stessa</li>
	<li>Gestire aspetti contrattuali e di convenzioni anche in ambito internazionale</li>
	<li>Coordinare l’ufficio legale dell’impresa, fornendo assistenza e consulenza legale alle unità organizzative e curando controversie legali e contenziosi</li>
	<li>Curare i rapporti con gli studi notarili per la stipula dei contratti a rogito esterno; tiene il repertorio degli atti soggetti a registrazione</li>
	<li>Supportare l'ufficio commerciale dell’impresa</li>
	<li>Soluzione delle controversie di lavoro</li>
	<li>Stendere e controllare documenti amministrativi, contratti e convenzioni, delibere e protocolli, elaborazione di regolamenti e ordinamenti</li>
</ul> 
 
<h3>Sbocchi lavorativi</h3>
<ul>
	<li>Consulente legale interno o esterno presso  uffici legali, commerciali, amministrativi e della comunicazione di imprese ed enti non lucrativi</li>
	<li>Esperto legale in amministrazioni ed enti pubblici</li>
</ul>
 
 <h3>Corsi che ti potrebbero interessare</h3>
 <p><?php
	// displays select option with excel file data
	echo $excel_data;
?>  
</p>

 <h3>Contatta tutor del corso</h3>
 <p><b>Mario Rossi</b> : mario.rossi@unibo.it</p>

<button class="rounded" id="butt1" onclick="location.href='http://corsi.unibo.it/Laurea/GiuristaImpresa/Pagine/default.aspx'">Collegamento sito</button>
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
<script>
function openYear(evt, year) {
  var i, x, tablinks;
  x = document.getElementsByClassName("anno");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(year).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>
	</body>
</html>