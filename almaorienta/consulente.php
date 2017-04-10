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
 		  if(isset($sheet['cells'][$x][$y]) && $sheet['cells'][$x][2] == "Consulente del lavoro e delle relazioni aziendali"){
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
			   if (!in_array($str, $corsi) && $cellPrec != "Consulente del lavoro e delle relazioni aziendali") {
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
					  <header class="section_header">Corso di Consulente del lavoro e delle relazioni aziendali </header>
<h3>Definizione</h3>
<p>Il Consulente del lavoro svolge una serie di attività relative alla gestione del personale, in materia di lavoro, previdenza e 
assistenza sociale. Questa figura professionale, disciplinata dalla legge n. 12 del 1979, "Norme per l’ordinamento della professione di
 consulente del lavoro", può esercitare soltanto se iscritta nell’apposito Albo dei Consulenti del lavoro.</p>
<h3>Funzioni</h3>
<ul>
	<li>Gestione delle pratiche connesse alla creazione, definizione ed evoluzione di un rapporto di lavoro</li>
	<li>Tenuta delle procedure e delle posizioni contabili, economiche, giuridiche, assicurative, previdenziali e sociali che un rapporto di lavoro comporta</li>
	<li>Informazione sugli adempimenti in materia di lavoro, previdenza ed assistenza sociale dei lavoratori</li>
	<li>Studio e gestione dei criteri e delle modalità di retribuzione</li>
	<li>Tenuta del libro paga e dei prospetti paga, calcolo dei contributi Inps, Inail e delle altre casse di previdenza, redazione dei modelli Cud</li>
	<li>Interpretazione ed applicazione dei contratti collettivi</li>
	<li>Soluzione delle controversie di lavoro</li>
	<li>Interpretare le norme retributive, fiscali, previdenziali e assistenziali, relative al rapporto di lavoro</li>
	<li>Applicare gli adempimenti previsti per legge, fornendo informazioni ai clienti</li>
	<li>Analisi delle esigenze organizzative e alla conduzione delle prove di selezione</li>
	<li>Utilizzare i software dedicati all’amministrazione del personale</li>
	<li>Valutazione del fabbisogno di personale di cui necessita un’organizzazione, non solo considerando i prevedibili flussi in entrata, 
	in uscita e in mobilità interna, ma soprattutto sulla base degli obiettivi aziendali</li>
	<li>Elaborazione dei profili del personale da assumere e precisazione dei requisiti da ricercare</li>
	<li>Selezione del personale, effettuata per mezzo di interviste, colloqui, test di valutazione individuali e/o di gruppo, allo scopo di 
	individuare il candidato che meglio risponde ai requisiti ricercati, anche attraverso relazioni con agenzie per il lavoro</li>
	<li>Svolgimento di interventi di formazione e di addestramento delle risorse umane già occupate o di quelle da inserire nell’organizzazione,
	riguardo a competenze sia attuali che da sviluppare in futuro</li>
	<li>Gestione dello sviluppo di carriera</li>
	<li>Messa a punto di strumenti di valutazione delle prestazioni, così come di interventi volti a stimolare e promuovere le motivazioni dei lavoratori</li>
	<li>Gestione delle problematiche sindacali,collaborazione alla definizione delle politiche retributive, nonché delle iniziative legate ai temi 
	della salute e della sicurezza sui luoghi di lavoro, in linea con tutto ciò che riguarda la tutela, lo sviluppo e la valorizzazione delle risorse umane impiegate in un’organizzazione</li>
</ul> 
 
<h3>Sbocchi lavorativi</h3>
<ul>
	<li>Il mio studio, come libero professionista</li>
	<li>Consulente del lavoro nell’area delle risorse presso l’azienda committente</li>
	<li>Consulente del lavoro presso le associazioni dei datori che erogano servizi agli iscritti</li>
	<li>Esperto in gestione delle risorse umane ed organizzazione aziendale</li>
	<li>Responsabile della gestione delle risorse umane</li>
	<li>Direttore del personale</li>
	<li>Operatore del mercato del lavoro presso le agenzie del lavoro, in centri di orientamento, in centri per l’impiego, 
	nella scuola e nelle università</li>
	<li>Operatore presso enti di formazione professionale</li>
	<li>Esperto di relazioni sindacali in funzione del personale di aziende di medio-grandi dimensioni con un rapporto di lavoro di tipo dipendente</li>
	<li>Esperto di relazioni sindacali presso le associazioni sindacali, datoriali e dei lavoratori</li>
	<li>Responsabile di relazioni sindacali in aziende medio-grandi</li>
	<li>Addetto alla sicurezza aziendale</li>
	<li>Responsabile del servizio di prevenzione e protezione</li>

</ul>
 
 <h3>Corsi che ti potrebbero interessare</h3>
 <p><?php
	// displays select option with excel file data
	echo $excel_data;
?>  
</p>

 <h3>Contatta tutor del corso</h3>
 <p><strong>Mario Rossi</strong> : mario.rossi@unibo.it</p>
 

<button class="rounded" id="butt1" onclick="location.href='http://corsi.unibo.it/Laurea/ConsulenteLavoroRelazioniAziendali/Pagine/default.aspx'">Collegamento sito</button>
<button class="rounded" id="butt2" onclick="location.href='test_ammissione.html'">Test d'ammissione</button>
<button class="rounded" id="butt3"  onclick="location.href='piano_didattico2.html'">Piano didattico</button>

 
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