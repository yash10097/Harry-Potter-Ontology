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
	$q="\"SELECT DISTINCT ?y WHERE {?y rdfs:subClassOf bio:Event. ?z rdf:type ?y.}\"";
	$com='java -jar C:\ontology\owl2.jar '.$q;
	$outp= shell_exec($com);
	$out111=explode(']',$outp);
	$out2=explode('|',$out111[1]);
	$out111=array();
	$i=3;
	while($i<sizeof($out2)-1){
		if($out2[$i][0]==" ")
			$out111[$i-3]=$out2[$i];
		$i=$i+1;
	}
	sort($out111);
	
?>
<!DOCTYPE html>
<html class=" fsjs fsno-flexbox fsno-touch fsgeolocation fsdraganddrop fsrgba fsbackgroundsize fsborderimage fsborderradius fsboxshadow fstextshadow fsopacity fscsscolumns fscssgradients fsfontface fsvideo fsaudio fslocalstorage fssessionstorage fsapplicationcache fsjs fsno-flexbox fsno-touch fsgeolocation fsdraganddrop fsrgba fsbackgroundsize fsborderimage fsborderradius fsboxshadow fstextshadow fsopacity fscsscolumns fscssgradients fsfontface fsvideo fsaudio fslocalstorage fssessionstorage fsapplicationcache" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow"> 
    <meta name="twitter:card" content="summary">
<meta name="twitter:url" content="">
<meta name="twitter:site" content="@formstack">
<meta name="twitter:title" content="Harry Potter Ontology Search">
<meta name="twitter:description" content="Formstack Form - Harry Potter Ontology Search">
<meta name="twitter:image:src" content="https://www.formstack.com/admin/images/user/form_thumbnail_1625615_52846c1fa90b8.png">
<meta name="twitter:app:name:iphone" content="Formstack Forms">
<meta name="twitter:app:name:ipad" content="Formstack Forms">
<meta name="twitter:app:name:googleplay" content="Formstack Online Forms">

<meta name="twitter:app:id:iphone" content="id526805387">
<meta name="twitter:app:id:ipad" content="id526805387">
<meta name="twitter:app:id:googleplay" content="com.formstack.android">

    <title>Harry Potter Ontology Search - Formstack</title>

            <meta name="description" content="Formstack is a simple &amp; powerful web form builder that creates secure forms for payment, surveys, contact &amp; more. Try Formstack's online form builder free.">
    
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" media="all" href="http://www.formstack.com/forms/css/3/ie.css" />
    <![endif]-->
    
    <!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="http://www.formstack.com/forms/css/3/ie7.css" /><![endif]-->
    <!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="http://www.formstack.com/forms/css/3/ie6fixes.css" /><![endif]-->
    
        <link rel="stylesheet" type="text/css" href="advanced%20search_files/reset.css">
        <link rel="stylesheet" type="text/css" href="advanced%20search_files/default.css">
        
    
        <style type="text/css">
        body {background-color: ;background-image: url(/forms/images/user/277001_tmpl_back_5284755713d0a.png);background-repeat: repeat;}



.fsBody .fsForm .fsSectionHeader {

        
}

.fsBody .fsForm .fsSectionHeading {

    
        
    
        

}

.fsBody .fsForm .fsSectionText {

    
        
    
        

}

.fsBody .fsForm .fsLabel, .fsBody .fsForm .fsOptionLabel, .fsBody .fsForm .fsMatrix th, .fsBody .fsForm .fsMatrixLabel {

        
        
        
}


.fsBody .fsForm input[type=text].fsField, 
.fsBody .fsForm input[type=file].fsField, 
.fsBody .fsForm input[type=number].fsField,
.fsBody .fsForm input[type=email].fsField,
.fsBody .fsForm input[type=tel].fsField,
.fsBody .fsForm textarea.fsField, 
.fsBody .fsForm select.fsField {

    
        
        
}


.fsBody .fsForm input[type=text].fsRequired, 
.fsBody .fsForm input[type=file].fsRequired, 
.fsBody .fsForm input[type=number].fsRequired, 
.fsBody .fsForm input[type=email].fsRequired, 
.fsBody .fsForm input[type=tel].fsRequired, 
.fsBody .fsForm textarea.fsRequired, 
.fsBody .fsForm select.fsRequired {

        
        
}




.fsBody .fsRowTop, .fsBody .fsRowBottom, .fsBody .fsRowOpen, .fsBody .fsRowClose { display: none; }

        </style>
    
        
    </head>
<body id="fsLocal" class="fsBody fsFree  ">

        <h1 id="fsTopLogo">
        <a href="http://www.formstack.com/ar/547446/try-formstack?utm_source=h&amp;utm_medium=fa&amp;utm_campaign=fa&amp;fa=h,1625615">Powered by Formstack, online form builder. Easy tools, powerful forms.</a>
        <div class="reportAbuse"><a href="http://www.formstack.com/abuse">Report Abuse</a></div>    </h1>
      
    
        
        





<form method="post" novalidate="" action="query.php" class="fsForm fsFormFree fsMultiColumn fsMaxCol2" id="fsForm1625615">

    <input name="form" value="1625615" type="hidden">
    <input name="viewkey" value="rhFb4ZXU2r" type="hidden">
    
    <input name="password" value="" type="hidden">
    <input name="hidden_fields" id="hidden_fields1625615" value="" type="hidden">
    <input name="fspublicsession" id="session_id1625615" value="" type="hidden">
    <input name="incomplete" id="incomplete1625615" value="" type="hidden">
    <input name="incomplete_email" id="incomplete_email1625615" value="" type="hidden">
    <input name="referrer" id="referrer1625615" value="" type="hidden">
    <input name="referrer_type" id="referrer_type1625615" value="link" type="hidden">
    <input name="_submit" value="1" type="hidden">
    <input name="style_version" value="3" type="hidden">

    <input name="latitude" value="" type="hidden">
    <input name="longitude" value="" type="hidden">

    
    


<div role="alert" id="requiredFieldsError" style="display:none;">Please fill in a valid value for all required fields</div>
<div role="alert" id="invalidFormatError" style="display:none;">Please ensure all values are in a proper format.</div>
<div role="alert" id="resumeConfirm" style="display:none;">Are you sure you want to leave this form and resume later?</div>
<div role="alert" id="fileTypeAlert" style="display:none;">You must upload one of the following file types for the selected field:</div>
<div role="alert" id="embedError" style="display:none;">There was an error displaying the form. Please copy and paste the embed code again.</div>
<div role="alert" id="applyDiscountButton" style="display:none;">Apply Discount</div>
<div role="alert" id="dcmYouSaved" style="display:none;">You saved</div>
<div role="alert" id="dcmWithCode" style="display:none;">with code</div>
<div role="alert" id="submitButtonText" style="display:none;">Submit</div>
<div role="alert" id="submittingText" style="display:none;">Submitting</div>

<div class="fsPage" id="fsPage1625615-1">


    
            
                
                        
                                                    
                                                    
             
            
            <div class="fsSection fs2Col" id="fsSection22607826">           

            
                                        
                                                    
            <div class="fsSectionHeader">
            <h2 class="fsSectionHeading">Advanced Search</h2>
        
    </div>


        
        
            
                
                        
                        
                                                    
                                        
                                                    
                        
                                                
                <div id="fsRow1625615-2" class="fsRow fsFieldRow">

                        
                                                    
                        
                        
                        
                                    
            <div class="fsRowBody fsCell fsFieldCell  fsFirst  fsLabelVertical  fsSpan50 " id="fsCell22607768">
                
                                    <label id="label22607768" class="fsLabel" for="field22607768">Characters                                            </label>
                                
                                                   
                <select id="field22607768" name="field22607768[]" size="5" multiple="multiple" class="fsField ">

						<?php 
								foreach($out1 as $a){
									$b=explode(':',$a)[1];
									echo "<option value=\"info.php?variable=".$b."\">".$b. "</option>";
							}?>

</select>

                
                                                                    
                
                
                
            </div>
            
                        
        
    
            
                
                        
                        
                                                    
                                        
                                                    
                        
                                                    
                        
                                                    
                        
                                                                
            <div class="fsRowBody fsCell fsFieldCell   fsLast fsLabelVertical  fsSpan50 " id="fsCell22607962">
                
                                    <label id="label22607962" class="fsLabel" for="field22607962">Event Moods                                            </label>
                                
                                                   
                <select id="field22607962" name="field22607962[]" size="5" multiple="multiple" class="fsField ">

       <?php 
								foreach($out111 as $a){
									$b=explode(':',$a)[1];
									echo "<option value=\"info.php?variable=".$b."\">".$b. "</option>";
							}?>

</select>

                
                                                                    
                
                
                
            </div>
            
                            
                </div>
                        
        
        
            
                
                        
                        
                                                    
                                        
                                                    
                        
                                                
                <div id="fsRow1625615-3" class="fsRow fsFieldRow fsLastRow">

                        
                                                    
                        
                        
                        
                                    
            <div class="fsRowBody fsCell fsFieldCell  fsFirst  fsLabelVertical  fsSpan50 " id="fsCell22607818">
                
                                    <label id="label22607818" class="fsLabel" for="field22607818">Events                                            </label>
                                
                                                   
                <select id="field22607818" name="field22607818[]" size="5" multiple="multiple" class="fsField " width="800" style="width: 800px">

         <?php 
								foreach($out11 as $a){
									$c=explode(":",explode('@',$a)[1])[1];
									$b=explode('^',$a)[0];
									echo "<option value=\"info.php?variable=".$c."\">".$b."<br>";
								}
							?>
</select>
                
                                                                    
                
                
                
            </div>
            
                            
                </div>
                        
        
        
            
                
                        
                                                
                </div>
                
                
                                
                        
                                                    
                                                    
             
            <p></p><p></p><p>
            </p><div class="fsSection fs1Col" id="fsSection22607963">           

            
                                        
														
            <div class="fsSectionHeader">
            <h2 class="fsSectionHeading">SPARQL query</h2>
        
    </div>


        
        
            
                
                        
                        
                                                    
                                        
                                                    
                        
                                                
                <div id="fsRow1625615-5" class="fsRow fsFieldRow fsLastRow">

                        
                                                    
                        
                        
                        
                                                                
            <div class="fsRowBody fsCell fsFieldCell  fsFirst fsLast fsLabelVertical  fsSpan100 " id="fsCell22607832">
                
                                    <label id="label22607832" class="fsLabel fsRequiredLabel" for="field22607832">SPARQL Query<span class="fsRequiredMarker">*</span>                                            </label>
                                
                                                   
                <textarea id="field22607832" name="field22607832" rows="10" cols="80" required="" class="fsField fsRequired" aria-required="true">SELECT ?y ?a WHERE {?y rdfs:subClassOf bio:Event. ?z rdf:type ?y. ?z bio:has_characters_involved ?a}</textarea>

                
                                                                    
                
                
                
            </div>
            
                            
                </div>
                        
        
    

            
    </div>
    
    
    
</div>

        
<div id="fsSubmit1625615" class="fsSubmit fsPagination">

         
    <button type="button" id="fsPreviousButton1625615" class="fsPreviousButton" value="Previous Page" style="display:none; background:#FFFFFF;color:#000000;background-image: -moz-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(#ffffff), color-stop(#FFFFFF));
                    background-image: -webkit-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -o-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -ms-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: linear-gradient(to bottom, #ffffff, #FFFFFF);padding:6px 45px;border:0px;font-weight:bold;border-radius:50px;-moz-border-radius:50px;-webkit-border-radius:50px;"><span class="fsFull">Previous</span><span class="fsSlim">←</span></button> 
    <button type="button" id="fsNextButton1625615" class="fsNextButton" value="Next Page" style="display:none; background:#FFFFFF;color:#000000;background-image: -moz-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(#ffffff), color-stop(#FFFFFF));
                    background-image: -webkit-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -o-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: -ms-linear-gradient(top, #ffffff, #FFFFFF);
                    background-image: linear-gradient(to bottom, #ffffff, #FFFFFF);padding:6px 45px;border:0px;font-weight:bold;border-radius:50px;-moz-border-radius:50px;-webkit-border-radius:50px;"><span class="fsFull">Next</span><span class="fsSlim">→</span></button>

            <input id="fsSubmitButton1625615" class="fsSubmitButton nice" style="background: linear-gradient(to bottom, rgb(255, 255, 255), rgb(255, 255, 255)) repeat scroll 0% 0% rgb(255, 255, 255); color: rgb(0, 0, 0); padding: 6px 45px; border: 0px none; font-weight: bold; border-radius: 50px;" value="Submit" type="submit">   
        

        

        
    <div class="clear"></div>
    
</div>

    
        <script type="text/javascript" src="advanced%20search_files/jquery.js"></script>
            <link href="advanced%20search_files/jquery-ui.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="advanced%20search_files/jquery-ui.js"></script>
    
    <script type="text/javascript" src="advanced%20search_files/scripts.js"></script>

    
    
    
    <script type="text/javascript">
        
        if(window.addEventListener) {
            window.addEventListener('load', loadFormstack, false);
        } else if(window.attachEvent) {
            window.attachEvent('onload', loadFormstack);
        } else {
            loadFormstack();
        }
        
        
        function loadFormstack() {
            var form1625615 = new Formstack.Form(1625615);
            
            
                        

            form1625615.logicFields = [];
            
            
            form1625615.calcFields = [];

            form1625615.init();

            
            
            window.form1625615 = form1625615;
        };
    </script>


        

    <div style="clear:both"></div>

</form>


    <script type="text/javascript" src="advanced%20search_files/modernizr.js"></script>


    
    
    
    
</body></html>