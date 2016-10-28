<?php
	error_reporting(E_ERROR | E_PARSE);
	$a=$_GET['variable'];
	$dir= "Imagexml";
	$dir1= "videoxml";	
	$section = file_get_contents('/TextXml/L.txt', true);
	$link=explode('@',$section);
?>

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
	<div id="page">
		<div id="header">
			<a href="index.html" id="logo"><img src="images/logo.jpg" alt="Logo"></a>
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="search.html">Advanced Search</a>
				</li>
			</ul>
		</div>
		<div id="body">
			<div id="content">
				<div id="article">
					<h1><?php echo $a?></h1>
					<p>
						        <div class="content_body_section">
             <div class="content_body_section_content">
                	<h2><?php echo "Image Gallery for ".$a?><h2>
             </div>
        	
            
            <!-- gallery start *-->
				<script type="text/javascript">
                    function startGallery() {
                        var myGallery = new gallery($('myGallery'), {
                            timed: true
                        });
                    }
                    window.addEvent('domready',startGallery);
                </script>
                <div class="content">
                    <div id="myGallery">
						<?php
							if ($handle = opendir($dir)) {
							while (false !== ($entry = readdir($handle))) {
								#echo "<br>$entry<br>";
								if($entry!="." and $entry!=".."){
									$filename=$dir."\\".$entry;
									$pieces = explode(".", $entry);
									$name=$pieces[0].".jpg";
									$xml = new SimpleXMLElement(file_get_contents($filename));
									$section = $xml->asXML();
									if(strpos($section,$a)!== false){
										echo "<div class=\"imageElement\">";
										echo "<h3>".$a."<h3>"; 
										echo "<p>Photo Gallery embedded in this template.</p>"; 
										echo "<a href=\"#\" title=\"open image\" class=\"open\"></a>";
										echo "<img src=\"images/images/".$name."\" alt=\"image\" class=\"full\" />";
										echo "<img src=\"images/images/".$name."\" alt=\"image\" class=\"thumbnail\" />";
										echo "</div>";
									}
								}
							}
							closedir($handle);
							}
						?>
				   </div>
                </div>
            	<!-- end of gallery -->
		
				
			<div style="width: 100%; height: 50%; background-color: red; clear:both"></div>	
    
          <?php 
		  $section=file_get_contents('/Textxml/'.$a.'.xhtml',true);
		  echo $section;
		  ?>
		  
        </div>
		<p><p>
		
		
		<div id="templatemo_content_body">
    	
        <div class="content_body_section">
        	
            <div class="content_body_section_content">
                	<h2><?php echo "Video Gallery for ".$a?><h2>
            </div>	
			
			<div id="sliderFrame">
				<div id="slider">
				<?php
					if ($handle = opendir($dir1)) {
						$check=1;
						while (false !== ($entry = readdir($handle))) {
							if($entry!="." and $entry!=".."){
								$filename=$dir1."\\".$entry;
								$pieces = explode(".", $entry);
								$name=$pieces[0];
								
								//parsing the xml
								$xml = new SimpleXMLElement(file_get_contents($filename));
								$str = $xml->asXML();
								$i=0;
								$parse="";
								while($i<strlen($str)){
									$parse=$parse.$str[$i]." ";
									$i=$i+1; 
								}
								$arr=explode('< N a m e >',$parse);
								$final_arr=array();
								$i=0;
								foreach($arr as $arr)
									if(strpos($arr,'< / N a m e >')!== false){
										$final_array[$i]=explode('< / N a m e >',$arr)[0];
										$final_array[$i]=str_replace(' ','',$final_array[$i]);
										$i=$i+1;
									}
								$final_array=array_unique($final_array);
								
								foreach($final_array as $b){
										if(strpos($b,$a)!== false){
											#echo $b." ".$a."<br>".$name."<br>";
											echo "<a class=\"video\" href=\"http://www.youtube.com/watch?v=".$name."\">";
											#data-autovideo="1
											echo "<b data-src=\"images/videos/".$name.".jpg\"></b>";
											echo "</a>";
											$check=0;
										}
								}
							}
						}
						if($check==1){
									echo "<b data-src=\"css/notfound.jpg\"</b>";
								}
						closedir($handle);
					}
				?>
            	
				</div>
			</div>
		</div>
		</div>		

				</div>
				<div id="sidebar">
					<?php
	
	echo "<h3>Properties</h3><br>";
	#$a="Hermoine";
	echo "<Font size=\"2\">";
	$q="\"SELECT DISTINCT ?y ?a WHERE {bio:".$a." ?y ?a}\"";
	$com='java -jar C:\ontology\owl2.jar '.$q;
	$outp= shell_exec($com);
	$out1=explode(']',$outp);
	$out2=explode('|',$out1[1]);
	$mark=0;
	$i=4;
	$str2="bio";
	while($i<sizeof($out2)){
		if($i%3==1 and $out2[$i][1] == $str2[0] and $out2[$i][2] == $str2[1] and $out2[$i][3] == $str2[2]){
			//echo explode(':',$out2[$i]."--- ")[1];
			echo " &nbsp;&nbsp;&nbsp;".explode(':',$out2[$i])[1]."---- ";
			$mark=1;
		}
		if($i%3==2 and $mark==1){
			//echo explode(':',$out2[$i]."<br><br>")[1];
			if($out2[$i][1]=="b"){
				$strn=explode(':',$out2[$i])[1];
				$j=0;
				$match=0;
				while($j<sizeof($link)){
					if($j%2==0)
						#echo strlen(trim($link[$j]))." ".strlen(trim($strn));
						$k=0;
						$chk=0;
						while($k<strlen(trim($link[$j]))){
							if(trim($link[$j])[$k]!=$strn[$k])
								$chk=1;
							$k=$k+1;
						}
						if($chk==1){
					
						}
						else{
							$match=1;
							break;
						}
					$j=$j+1;
				}
				if($match==0)
					echo "<a href=\"info.php?variable=".$strn."\">".$strn."</a><br><br>";
				else
					echo "<a href=\"".$link[$j+1]."\">".$strn."</a><br><br>";
				}
			else
				echo explode('^',$out2[$i])[0]."<br><br>";
			$mark=0;
		}
		$i=$i+1;
		if($i%3==0)
			continue;		
	}
	?>
	</Font>
				</div>
			</div>
		</div>
						
		<div id="footer">
			<p>
				Designed by Group 5</p>
				<p>Aakarsha Agarwal | Aniya Aggarwal | Sudip Mittal | Yash Lamba</p>
		</div>
	</div>
</body>
</html>