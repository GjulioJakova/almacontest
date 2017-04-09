<?php
include 'excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;
$excel->read('test.xls');
 echo '
 <script>
 
  function populate(){
	var s1 = document.getElementById("slct1");
	var s2 = document.getElementById("slct2");

	s2.innerHTML = "";
 
	for(var option in optArray){

		var pair = optArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0] + "|" +pair[1];
		newOption.text = pair[1];
 		if(newOption.value.includes(s1.value)){
			s2.options.add(newOption);
		}
	}
}
</script>
 ';
 

function sheetData($sheet){
	$slct1 = "slct1";
	//$slct2 = "slct2";
	
	$scuole = array();
	
	$re = "<select id='slct1' name='scuola' onchange='populate()'>";
	$re .= "<option value='null'></option>";
	$x = 1;
	
	while($x <= $sheet['numRows']){
		$y = 1;
	      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
		  if(isset($sheet['cells'][$x][$y]) && $cell != ""){
			$cellPrec = $sheet['cells'][$x][1];
 			if (!in_array($cellPrec, $scuole)) {
				array_push($scuole,$cellPrec);
			    $re .= "<option value='$cellPrec'>$cell</option>";
			}
			   
		  }
 	    $x++;
	}
 	
    $re .="</select>";

	
	/*$re .= "<label>Attivita': <select id='slct2' name='attivita' required>";
	$x = 1;
	
	$optionArray = array("|");
	
	while($x <= $sheet['numRows']){
		$y = 3;
		while($y <= $sheet['numCols']){
	      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
		  if(isset($sheet['cells'][$x][$y]) && $cell != ""){
			   $cellPrec = $sheet['cells'][$x][1];
			   $cellDef = $cellPrec . "|" . $cell;
			   
			   if (!in_array($cellDef, $optionArray)) {
					array_push($optionArray,$cellDef);
			   }
	//		   $re .= "<option value='$cellPrec'> $cell </option>";
 		  }
		  $y++;
		}
 	    $x++;
	}
	echo "<script> var optArray = ". json_encode($optionArray)."</script>";
 
	return $re .'</select> </label>';*/
	
	$re .= "<label>Luogo di lavoro: <select id='slct2' name='luogo' required>";
	$x = 1;
	
	$optionArray = array("|");
	
	while($x <= $sheet['numRows']){
		$y = 4;
		while($y <= $sheet['numCols']){
	      $cell = isset($sheet['cells'][$x][$y]) ? $sheet['cells'][$x][$y] : '';
		  if(isset($sheet['cells'][$x][$y]) && $cell != ""){
			   $cellPrec = $sheet['cells'][$x][1];
			   $cellDef = $cellPrec . "|" . $cell;
			   
			   if (!in_array($cellDef, $optionArray)) {
					array_push($optionArray,$cellDef);
			   }
	//		   $re .= "<option value='$cellPrec'> $cell </option>";
 		  }
		  $y++;
		}
 	    $x++;
	}

	echo "<script> var optArray = ". json_encode($optionArray)."</script>";
 
	return $re .'</select> </label>';

}

   $excel_data =  sheetData($excel->sheets[0]);  
/*if (isset($_POST['scuola'])) {   
       unset($_POST['scuola']);
}*/
?>
<!DOCTYPE HTML> 
<html lang="it">
	<head>
		<title>ALMA Orienta</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		<link rel="stylesheet" href="assets/css/main.css"/>
		
	<style>
	#calendar {
		width: 40%;
 		margin: 0 auto;		 
	}
	iframe{
		width:500;
		height:67%;
 		margin:0;
	} 
	section{
			display:block;
		}
	
	 .tiles article#style1 > .image:before {
				background: linear-gradient(to bottom right, sienna,orange);
			}
	.tiles article#style2 > .image:before {
				background: linear-gradient(to bottom right, orange,orange);
			}
	.tiles article#style3 > .image:before {
				background: linear-gradient(to bottom right, orange,sienna);
			}
			
	@media only screen and (max-device-width: 480px) {
		 
	label{
		display: block;
	} 
	#calendar{
		width: 95%;
		height: 85%;
		border: 1px dashed darkorange;
	}
	iframe{
		width: 100%;
		height: 100%;
		margin: 0 auto;
	}
	div.end1, div.end2{
			display: block;
			float:none;
			width:80%;
			margin: 0 auto;

		}
		#follow{
			display:none;
		}
		
		.tiles article#style1 > .image:before {
				background: linear-gradient(to bottom right, orange,orange) !important;
			} 
			
	 .tiles article#style2 > .image:before{
				background: linear-gradient(to bottom right, sienna,orange) !important;
			}
	 	
      .show-mobile {
        display: block;
      }
      .hide-mobile {
        display: none;
      }
    }

 @media screen and (min-device-width: 481px) {
      .show-mobile {
        display: none;
      }
      .hide-mobile {
        display: block;
      }
    }
	 
	</style>
	</head>
	<script>
	 var toggle = function() {
  var mydiv = document.getElementById('container');
  if (mydiv.style.display === 'block' || mydiv.style.display === '')
    mydiv.style.display = 'none';
  else
    mydiv.style.display = 'block'
  } 
</script>
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
							<li><a href="">Scuola di Agraria e Medicina veterinaria</a></li>
							<li><a href="">Scuola di Economia, Management e Statistica</a></li>
							<li><a href="">Scuola di Farmacia, Biotecnologie e Scienze motorie</a></li>
							<li><a href="giurisprudenza.html">Scuola di Giurisprudenza</a></li>
							<li><a href="">Scuola di Ingegneria e Architettura</a></li>
							<li><a href="">Scuola di Lettere e Beni culturali</a></li>
							<li><a href="">Scuola di Lingue e Letterature, Traduzione e Interpretazione</a></li>
							<li><a href="medicina.html">Scuola di Medicina e Chirurgia</a></li>
							<li><a href="">Scuola di Psicologia e Scienze della Formazione</a></li>
							<li><a href="">Scuola di Scienze</a></li>
							<li><a href="">Scuola di Scienze Politiche</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
					
						<div class="inner">
						
						<form method="post" action="results.php">
						
						<label>Scuola:
						<?php
						// displays select option with excel file data
						echo $excel_data;
						?>  
						</label>
						 
						<input class="bottone" type="submit" value="Cerca"/>
						</form>
 							 <span class="choice1"><a href="autoriflessione.html">Comincia il tuo viaggio...</a></span>
 
							 <section class="tiles">
							 
								<article id="style1" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Agraria e Medicina veterinaria</h2>
										 
									</a>
								</article>
								
								<article id="style2" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Ingegneria e Architettura</h2>
									</a>
								</article>
								
								<article id="style3" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Lingue e Letterature, Traduzione e Interpretazione</h2>
									</a>
								</article>
								
								<article id="style1" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Economia, Management e Statistica</h2>
									</a>
								</article>
								
								<article id="style2" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Farmacia, Biotecnologie e Scienze motorie</h2>
									</a>
								</article>
								
								<article id="style3"class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Lettere e Beni culturali</h2>
									</a>
								</article>
								
								<article id="style1" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Scienze Politiche</h2>
									</a>
								</article>
								
								<article id="style2"class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="medicina.html">
										<h2>Scuola di Medicina e Chirurgia</h2>
									</a>
								</article>
								
								<article id="style3"class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Psicologia e Scienze della Formazione</h2>
									</a>
								</article>
								
								<article id="style1" class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="giurisprudenza.html">
										<h2>Scuola di Giurisprudenza</h2>
									</a>
								</article>
							
								<article id="style2"class="hide-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Scienze</h2>
									</a>
								</article>
								
								<!-- mobile -->
								<article id="style1" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Ingegneria e Architettura</h2>
									</a>
								</article>
								
								<article id="style1" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Farmacia, Biotecnologie e Scienze motorie</h2>
									</a>
								</article>
								
								<article id="style1" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="medicina.html">
										<h2>Scuola di Medicina e Chirurgia</h2>
									</a>
								</article>
								
								<article id="style1" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Scienze</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Agraria e Medicina veterinaria</h2>
 									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Economia, Management e Statistica</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Scienze Politiche</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="giurisprudenza.html">
										<h2>Scuola di Giurisprudenza</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Lettere e Beni culturali</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Lingue e Letterature, Traduzione e Interpretazione</h2>
									</a>
								</article>
								
								<article id="style2" class="show-mobile">
									<span class="image">
										<img src="images/logoSmart.png" alt="" />
									</span>
									<a href="">
										<h2>Scuola di Psicologia e Scienze della Formazione</h2>
									</a>
								</article>
								
							</section>
							
						</div>
					</div>
						


				<!-- Footer -->
					<footer id="footer">
					
					<div id="calendar">
							<iframe src="calendario.html" ></iframe>
					</div>
					<div class="inner">
					<div class="end1"> 
							<span class="end1"><a href="">Scopri Bologna</a></span>
					</div>
					
					<div class="end2">
							<span class="end1"><a href="infocontatti.html">Info e Contatti</a></span>
					</div>
					
						
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
			

		
			

	</body>
 
</html>