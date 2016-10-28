<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Harry Potter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- JIT Library File -->
	<link type="text/css" href="css/base.css" rel="stylesheet" />
	<script language="javascript" type="text/javascript" src="javascripts/jit.js"></script>
	<!-- Example File -->
	<script language="javascript" type="text/javascript" src="javascripts/graph_visualize.js"></script>

	<script type='text/javascript'> 

function jumpto(x){

if (document.form2.jumpmenu.value != "Jump to...") {
	document.location.href = x
	}
}

function jumpto1(x){

if (document.event.jumpmenu1.value != "Jump to...") {
	document.location.href = x
	}
}

</script>
</head>
<body onload="init();" >
	<div id="page">
		<div id="header">
			<a href="index.php" id="logo"><img src="images/logo.jpg" alt="Logo"></a>
			<ul>
				<li class="current">
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="search.html">Advanced Search</a>
				</li>
			</ul>
		</div>
		<div id="body">
			
			<div class="body">
				<h1>Ontology Visualization</h1>
				<div id="content_column2"> <br />
						<div id="infovis"></div> 
					</div>
					<div class="clear"></div>
					<div id="log"></div>
				<br>
				<hr>
				<?php
	error_reporting(E_ERROR | E_PARSE);
	$q="\"SELECT ?y WHERE {?y rdf:type bio:Character. }\"";
	$com='java -jar C:\ontology\owl2.jar '.$q;
	$outp= shell_exec($com);
	$out1=explode(']',$outp);
	$out2=explode('|',$out1[1]);
	$out1=array();
	$i=3;
	while($i<sizeof($out2)-1){
		if($out2[$i][0]==" ")
			$out1[$i-3]=$out2[$i];
		$i=$i+1;
	}
	sort($out1);	
	
	$q="\"SELECT ?a ?y WHERE {?y rdf:type bio:Event. ?y bio:has_full_name ?a}\"";
	$com='java -jar C:\ontology\owl2.jar '.$q;
	$outp= shell_exec($com);
	$out11=explode(']',$outp);
	$out2=explode('|',$out11[1]);
	$out11=array();
	$i=4;
	$j=0;
	#print_r($out2);
	#echo "<br>";
	$mm=0;
	while($i<sizeof($out2)-1){
		if($out2[$i][0]==" "){
			if($mm==0){
				$out11[$j]=$out2[$i]."@";
				$mm=1;
			}
			else{
				$out11[$j]=$out11[$j].$out2[$i];
				$j=$j+1;
				$mm=0;
			}
		}
		$i=$i+1;
	}
	sort($out11);
	#print_r($out11);
	#echo "<br>";
									
?>
<h3>Search by Character </h3>
				  
				  <form name="form2" >
				  <select name="jumpmenu" class="style1" onChange="jumpto(document.form2.jumpmenu.options[document.form2.jumpmenu.options.selectedIndex].value)">
					<option>Jump to...</option>
						
				            <?php 
								foreach($out1 as $a){
									$b=explode(':',$a)[1];
									echo "<option value=\"info.php?variable=".$b."\">".$b. "</option>";
							}?>
							
                  </select>  
			      </form>
			
				<h3>Search by Event </h3>
				<form name="event" >
				  <select name="jumpmenu1" class="style1" onChange="jumpto1(document.event.jumpmenu1.options[document.event.jumpmenu1.options.selectedIndex].value)">
					<option>Jump to...</option>
						
				            <?php 
								foreach($out11 as $a){
									$c=explode(":",explode('@',$a)[1])[1];
									$b=explode('^',$a)[0];
									echo "<option value=\"info.php?variable=".$c."\">".$b."<br>";
								}
							?>
							
                  </select>  
			      </form>
				  <br>
				<hr>
				<ul>
					<li>
						<a href="info.php?variable=HarryPotter"><img src="images/harry.jpg" alt="Image"></a>
						<h2>Harry Potter</h2>
						<p>
							Played by: <a href="http://en.wikipedia.org/wiki/Daniel_Radcliffe">Daniel Radcliff</a>
						</p>
					</li>
					<li>
						<a href="info.php?variable=Hermoine"><img src="images/hermoine.jpg" alt="Image"></a>
						<h2>Hermoine Granger</h2>
						<p>
							Played by: <a href="http://en.wikipedia.org/wiki/Emma_Watson">Emma Watson</a>
						</p>
					</li>
					<li>
						<a href="info.php?variable=Ron_Weasley"><img src="images/ron.jpg" alt="Image"></a>
						<h2>Ron Weasley</h2>
						<p>
							Played by: <a href="http://en.wikipedia.org/wiki/Rupert_Grint">Rupert Grint</a>
						</p>
					</li>
					<li>
						<a href="info.php?variable=Albus_Dumbledore"><img src="images/albus.jpg" alt="Image"></a>
						<h2>Albus Dumbledore</h2>
						<p>
							Played by: 	<a href="http://en.wikipedia.org/wiki/Michael_Gambon">Michael Gambon</a>
						</p>
					</li>
				</ul>
			</div>
		<div id="footer">
			
			<p>
				Designed by Group 5</p>
				<p>Aakarsha Agarwal | Aniya Aggarwal | Sudip Mittal | Yash Lamba</p>
	</div>
			</p>
		</div>
	</div>
</body>
</html>