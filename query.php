<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Harry Potter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" charset="utf-8" />
	<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
	<link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
	
	<script src="javascripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
	<script src="javascripts/mootools-1.2-more.js" type="text/javascript"></script>
	<script src="javascripts/jd.gallery.js" type="text/javascript"></script>
	<script src="javascripts/mcVideoPlugin.js" type="text/javascript"></script>
	<script src="javascripts/js-image-slider.js" type="text/javascript"></script>
	
</head>
<body>
<div id="body">
			<div id="content">
				<div id="article">
					<h1>Search Results</h1>
					<p>


<?php
			
	function query($que,$num_files,$filenames){		
			$com='java -jar C:\ontology\owl2.jar '.$que;
			$outp= shell_exec($com);
			$out1=explode(']',$outp);
			$out2=explode('|',$out1[1]);
			#print_r($out2);
			$i=1;
			$num_var=0;
			while($i<sizeof($out2)){ 
				if($out2[$i][1]=="="){
					$num_var=$i-1;
					break;
				}
				$i=$i+1;
			}
			$i=$num_var+2;
			$res_count=1;
			$count=1;
			$mark=0;
			while($i<sizeof($out2)-1){ 
				if($mark==1){
					$res_count=$res_count+1;
					if($res_count<10)
						echo "<br>&nbsp;&nbsp;".$res_count.")&nbsp;";
					else if($res_count<100)
						echo "<br>&nbsp;".$res_count.")&nbsp;";
					else 
						echo "<br>".$res_count.")&nbsp;";
					$mark=0;
				}
				else{
					$temp=0;
					$mark1=0;
					while($temp<$num_files){
						if(strcmp(trim(explode(':',$out2[$i])[1]),$filenames[$temp])==0){
							$mark1=1;
							break;
						}
						$temp=$temp+1;
					}
					if($mark1==0){
						if($res_count==1)
							echo "&nbsp;&nbsp;".$res_count.")&nbsp;";
						echo "<a target=_blank href=\"info.php?variable=".trim(explode(':',$out2[$i])[1])."\">".$out2[$i]."</a>&nbsp;&nbsp;&nbsp";
					}
					else{
						if($res_count==1)
							echo "&nbsp;&nbsp;".$res_count.")&nbsp;";
						echo "<a target=_blank href=\"info.php?variable=".$filenames[$temp]."\">".$out2[$i]."</a>&nbsp;&nbsp;&nbsp";
						$mark1=0;
					}
					$count=$count+1;
					if($count>$num_var){
						$mark=1;
						$count=1;
					}
				}
				$i=$i+1;
			}
	}
	
	error_reporting(E_ERROR | E_PARSE);
	$q1="\"SELECT ?a ?y WHERE {?y rdf:type bio:Event. ?y bio:has_full_name ?a}\"";
	$com='java -jar C:\ontology\owl2.jar '.$q1;
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
	
	
	$search=0;
	$query_selector=0;
	foreach ($_POST as $key => $value) {
		if($key=="field22607768"){
			#print_r($value);
			$character=$value;
			$search="1";
		}
		else if($key=="field22607962"){
			#print_r($value);
			$mood=$value;
			$search="1";
		}
		else if($key=="field22607818"){
			#print_r($value);
			$event=$value;
			$search="1";
		}
		else if($key=="field22607832"){
			if($search==0)
				$q="\"".$value."\"";
		}
	}
	
	
	
	if($search!=0){
		
		//Only Event
		if(sizeof($event)!=0 and $query_selector==0){
			$query_selector=3;
		}
		
		//Only Characters
		if(sizeof($character)!=0 and $query_selector==0){
			$query_selector=1;
		}
		
		//Only Mood
		if(sizeof($mood)!=0 and $query_selector==0){
			$query_selector=2;
		}
		
		//Character and event
		if(sizeof($event)!=0 and $query_selector==1){
			$query_selector=4;
		}
		if(sizeof($event)!=0 and $query_selector==2){
			$query_selector=6;
		}
		if(sizeof($character)!=0 and $query_selector==3){
			$query_selector=4;
		}
		if(sizeof($character)!=0 and $query_selector==2){
			$query_selector=5;
		}
		if(sizeof($mood)!=0 and $query_selector==1){
			$query_selector=5;
		}
		if(sizeof($mood)!=0 and $query_selector==3){
			$query_selector=6;
		}
	

		//Reading file directory for links
		$cwd = getcwd();
		$dir= $cwd."\TextXml";
		$filenames=array();
		$num_files=0;
		if ($handle = opendir($dir)) {
			while (false !== ($entry = readdir($handle))) {
				#echo "<br>$entry<br>";
				if($entry!="." and $entry!=".."){
					$filename=$dir."\\".$entry;
					$pieces = explode(".", $entry);
					#echo $pieces[0]."<br>";
					$filenames[$num_files]=$pieces[0];
					$num_files=$num_files+1;
				}
			}
			closedir($handle);
		}
		
		
		
		//Only Characters
		if($query_selector==1){
			$ccount=1;
			foreach ($character as $f){
				echo $ccount.") ";
				echo "<a target=_blank href= ".$f."\">".explode("=",$f)[1]."</a>";
				echo "<br>";
				$ccount=$ccount+1;
			}
		}
		//Only event moods
		else if($query_selector==2){
			$ccount=1;
			foreach ($mood as $f){
				echo $ccount.") ";
				echo "<a target=_blank href= ".$f."\">".explode("=",$f)[1]."</a>";
				echo "<br>";
				$ccount=$ccount+1;
			}
		}
		//only events
		else if($query_selector==3){
			$ccount=1;
			foreach ($event as $f){
				$ii=0;
				$ttemp=explode("=",$f)[1];
				while($ii<sizeof($out11)){
					#echo explode('@',$out11[$ii])[1]." ".$ttemp."<br>";
					if(strpos(explode('@',$out11[$ii])[1],$ttemp)!=false){
						$b=explode('^',$out11[$ii])[0];
						echo $ccount.") ";
						echo "<a target=_blank href= ".$f."\">".$b."</a>";
						echo "<br>";
						$ccount=$ccount+1;
						break;
					}
					$ii=$ii+1;
				}
			}
		}
		//Character and event
		else if($query_selector==4){
			echo "<h2>Individual Profiles</h2><p>";
			$ccount=1;
			foreach ($character as $f){
				echo $ccount.") ";
				echo "<a target=_blank href= ".$f."\">".explode("=",$f)[1]."</a>";
				echo "<br>";
				$ccount=$ccount+1;
			}
			echo "<p><p><h2>Event Profiles</h2><p>";
			$ccount=1;
			foreach ($event as $f){
				$ii=0;
				$ttemp=explode("=",$f)[1];
				while($ii<sizeof($out11)){
					#echo explode('@',$out11[$ii])[1]." ".$ttemp."<br>";
					if(strpos(explode('@',$out11[$ii])[1],$ttemp)!=false){
						$b=explode('^',$out11[$ii])[0];
						echo $ccount.") ";
						echo "<a target=_blank href= ".$f."\">".$b."</a>";
						echo "<br>";
						$ccount=$ccount+1;
						break;
					}
					$ii=$ii+1;
				}
			}

			echo "<p><p><h2>Events containing all selected characters</h2><p>";
			$q="\"SELECT DISTINCT ?y WHERE { ?y rdf:type bio:Event. ";
			foreach ($character as $f1){
				$q=$q."?y bio:has_characters_involved bio:".explode("=",$f1)[1].". ";
			}
			$q=$q."}\"";
			query($q,$num_files,$filenames);
			
		
			echo "<p><p><h2>Characters present in all selected events</h2><p>";
			$q="\"SELECT DISTINCT ?x WHERE { ";
			foreach ($event as $f1){
				$q=$q."bio:".explode("=",$f1)[1]." bio:has_characters_involved ?x. ";
			}
			$q=$q."}\"";
			query($q,$num_files,$filenames);
			
				
		}
		
		
		//character and moods
		else if($query_selector==5){
			echo "<h2>Individual Profiles</h2><p>";
			$ccount=1;
			foreach ($character as $f){
				echo $ccount.") ";
				echo "<a target=_blank href= ".$f."\">".explode("=",$f)[1]."</a>";
				echo "<br>";
				$ccount=$ccount+1;
			}
			echo "<p><p><h2>Event Moods Profiles</h2><p>";
			$ccount=1;
			foreach ($mood as $f){
				echo $ccount.") ";
				echo "<a target=_blank href= ".$f."\">".explode("=",$f)[1]."</a>";
				echo "<br>";
				$ccount=$ccount+1;
			}
			
			echo "<p><p><h2>Events containing all selected characters with given mood</h2><p>";
			$q="\"SELECT DISTINCT ?y WHERE { ?y rdf:type bio:Event. ";
			foreach ($character as $f1){
				$q=$q."?y bio:has_characters_involved bio:".explode("=",$f1)[1].". ";
			}
			$q=$q."}\"";
			query($q,$num_files,$filenames);
			
		}
		
		else if($query_selector==6){
			$q="\"SELECT DISTINCT ?x ?y ?a WHERE {";
			foreach ($mood as $f){
				$q=$q."?x rdf:type bio:".$f; 
				foreach ($character as $f1){
					$q=$q."?x bio:has_characters_involved bio:".$f1.". ";
				}
			}
			$q=$q." }\"";
			echo $q;
		}
		else if($query_selector==7){
			echo "<p><p><h2>Event Mood - Events - Characters</h2><p>";
			$q="\"SELECT ?y ?z ?a WHERE {?y rdfs:subClassOf bio:Event. ?z rdf:type ?y. ?z bio:has_characters_involved ?a}\"";
			query($q,$num_files,$filenames);
		}
	}
	else{
		//Reading file directory for links
		$cwd = getcwd();
		$dir= $cwd."\TextXml";
		$filenames=array();
		$num_files=0;
		if ($handle = opendir($dir)) {
			while (false !== ($entry = readdir($handle))) {
				#echo "<br>$entry<br>";
				if($entry!="." and $entry!=".."){
					$filename=$dir."\\".$entry;
					$pieces = explode(".", $entry);
					#echo $pieces[0]."<br>";
					$filenames[$num_files]=$pieces[0];
					$num_files=$num_files+1;
				}
			}
			closedir($handle);
		}
		query($q,$num_files,$filenames);
	}
	
?>
</div>
</div>
</div>
</body>
</html>