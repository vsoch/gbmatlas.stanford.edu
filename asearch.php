<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Anatomical Search - GBM-Atlas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojo/dojo.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojo/NodeList-traverse.js"></script>
    <script src="js/chosen-dojo.js"></script>
    <link href="css/chosen.css" rel="stylesheet">



    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->
<body>
  <div class="wrapper">
    <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.svg" alt="logo"><h7> gbmAtlas</h7></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="publications.html">Publications</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <section id="title" class="orange">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Anatomical Search</h1>
                    <p>Search for differential expression between anatomical regions.</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                       <a href="gsearch.php"><button class="btn btn-transparent btn-lg" style="border-radius:0px;"><i class="icon-search icon-transparent"></i>Genes</button></a>
                       <a href="asearch.php"><button class="btn btn-transparent btn-lg" style="border-radius: 0px;"><i class="icon-signal icon-transparent"></i>Anatomical</button></a>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title-->

<section id="services">
<div class="container">
    <div class="row" style="padding-top: 20px; padding-left: 17px;"><label>Anatomic Search</label>
    <p>Please select anatomic localizations of tumor burden in group A and group B that you would like to perform a differential gene analysis on.</p>
    </div>
    <div class="row">
        <form action='aresult.php' method='post'>

        <div class="col-md-5">
            <h3>Group A</h3>
                <div> 
                    <select data-placeholder="Select Anatomic Locations" style="width:400px;" class="chzn-select-batch" multiple tabindex="6" name = "select1[ ]">
                        <option value=""></option>
                        <optgroup label="Level 1: Hemisphere">
                          <option value="Left.Cerebrum">Left Cerebrum</option>
                          <option value="Right.Cerebrum">Right Cerebrum</option>
                          <option value="Left.Cerebellum">Left Cerebellum</option>
                          <option value="Right.Cerebellum">Right Cerebellum</option>
                          <option value="Left.Brainstem">Left Brainstem</option>
                          <option value="Right.Brainstem">Right Brainstem</option>
                          <option value="Inter.Hemispheric">Inter-Hemispheric</option>
                        </optgroup>
                        <optgroup label="Level 2: Lobe">
                          <option value="Anterior.Lobe">Anterior Lobe</option>
                          <option value="Frontal.Lobe">Frontal Lobe</option>
                          <option value="Frontal-Temporal.Space">Frontal-Temporal Space</option>
                          <option value="Limbic.Lobe">Limbic Lobe</option>
                          <option value="Medulla">Medulla</option>
                          <option value="Midbrain">Midbrain</option>
                          <option value="Occipital.Lobe">Occipital Lobe</option>
                          <option value="Parietal.Lobe">Parietal Lobe</option>
                          <option value="Pons">Pons</option>
                          <option value="Posterior.Lobe">Posterior Lobe</option>
                          <option value="Sub.lobar">Sub-lobar</option>
                          <option value="Temporal.Lobe">Temporal Lobe</option>
                        </optgroup>
                        <optgroup label="Level 3: Gyrus">
                          <option value="Angular.Gyrus">Angular Gyrus</option>
                          <option value="Anterior.Cingulate">Anterior Cingulate</option>
                          <option value="Caudate">Caudate</option>
                          <option value="Cerebellar.Lingual">Cerebellar Lingual</option>
                          <option value="Cerebellar.Tonsil">Cerebellar Tonsil</option>
                          <option value="Cingulate.Gyrus">Cingulate Gyrus</option>
                          <option value="Claustrum">Claustrum</option>
                          <option value="Culmen">Culmen</option>
                          <option value="Culmen.of.Vermis">Culmen of Vermis</option>
                          <option value="Cuneus">Cuneus</option>
                          <option value="Declive">Declive</option>
                          <option value="Declive.of.Vermis">Declive of Vermis</option>
                          <option value="Extra.Nuclear">Extra-Nuclear</option>
                          <option value="Fastigium">Fastigium</option>
                          <option value="Fourth.Ventricle">Fourth Ventricle</option>
                          <option value="Fusiform.Gyrus">Fusiform Gyrus</option>
                          <option value="Inferior.Frontal.Gyrus">Inferior Frontal Gyrus</option>
                          <option value="Inferior.Occipital.Gyrus">Inferior Occipital Gyrus</option>
                          <option value="Inferior.Parietal.Lobule">Inferior Parietal Lobule</option>
                          <option value="Inferior.Semi-Lunar.Lobule">Inferior Semi-Lunar Lobule</option>
                          <option value="Inferior.Temporal.Gyrus">Inferior Temporal Gyrus</option>
                          <option value="Insula">Insula</option>
                          <option value="Lateral.Ventricle">Lateral Ventricle</option>
                          <option value="Lentiform.Nucleus">Lentiform Nucleus</option>
                          <option value="Lingual.Gyrus">Lingual Gyrus</option>
                          <option value="Medial.Frontal.Gyrus">Medial Frontal Gyrus</option>
                          <option value="Middle.Frontal.Gyrus">Middle Frontal Gyrus</option>
                          <option value="Middle.Occipital.Gyrus">Middle Occipital Gyrus</option>
                          <option value="Middle.Temporal.Gyrus">Middle Temporal Gyrus</option>
                          <option value="Nodule">Nodule</option>
                          <option value="Orbital.Gyrus">Orbital Gyrus</option>
                          <option value="Paracentral.Lobule">Paracentral Lobule</option>
                          <option value="Parahippocampal.Gyrus">Parahippocampal Gyrus</option>
                          <option value="Postcentral.Gyrus">Postcentral Gyrus</option>
                          <option value="Posterior.Cingulate">Posterior Cingulate</option>
                          <option value="Precentral.Gyrus">Precentral Gyrus</option>
                          <option value="Precuneus">Precuneus</option>
                          <option value="Pyramis">Pyramis</option>
                          <option value="Pyramis.of.Vermis">Pyramis of Vermis</option>
                          <option value="Rectal.Gyrus">Rectal Gyrus</option>
                          <option value="Subcallosal.Gyrus">Subcallosal Gyrus</option>
                          <option value="Sub.Gyral">Sub-Gyral</option>
                          <option value="Superior.Frontal.Gyrus">Superior Frontal Gyrus</option>
                          <option value="Superior.Occipital.Gyrus">Superior Occipital Gyrus</option>
                          <option value="Superior.Parietal.Lobule">Superior Parietal Lobule</option>
                          <option value="Superior.Temporal.Gyrus">Superior Temporal Gyrus</option>
                          <option value="Supramarginal.Gyrus">Supramarginal Gyrus</option>
                          <option value="Thalamus">Thalamus</option>
                          <option value="Third.Ventricle">Third Ventricle</option>
                          <option value="Transverse.Temporal.Gyrus">Transverse Temporal Gyrus</option>
                          <option value="Tuber">Tuber</option>
                          <option value="Tuber.of.Vermis">Tuber of Vermis</option>
                          <option value="Uncus">Uncus</option>
                          <option value="Uvula">Uvula</option>
                          <option value="Uvula.of.Vermis">Uvula of Vermis</option>
                        </optgroup>
                        <optgroup label="Level 4: Tissue Type">
                          <option value="Cerebro.Spinal.Fluid">Cerebro-Spinal Fluid</option>
                          <option value="Gray.Matter">Gray Matter</option>
                          <option value="White.Matter">White Matter</option>
                        </optgroup>
                        <optgroup label="Level 5: Cell Type">
                          <option value="Amygdala">Amygdala</option>
                          <option value="Anterior.Commissure">Anterior Commissure</option>
                          <option value="Anterior.Nucleus">Anterior Nucleus</option>
                          <option value="Caudate.Body">Caudate Body</option>
                          <option value="Caudate.Head">Caudate Head</option>
                          <option value="Caudate.Tail">Caudate Tail</option>
                          <option value="Corpus.Callosum">Corpus Callosum</option>
                          <option value="Dentate">Dentate</option>
                          <option value="Hippocampus">Hippocampus</option>
                          <option value="Hypothalamus">Hypothalamus</option>
                          <option value="Lateral.Dorsal.Nucleus">Lateral Dorsal Nucleus</option>
                          <option value="Lateral.Geniculum.Body">Lateral Geniculum Body</option>
                          <option value="Lateral.Globus.Pallidus">Lateral Globus Pallidus</option>
                          <option value="Lateral.Posterior.Nucleus">Lateral Posterior Nucleus</option>
                          <option value="Mammillary.Body">Mammillary Body</option>
                          <option value="Medial.Dorsal.Nucleus">Medial Dorsal Nucleus</option>
                          <option value="Medial.Geniculum.Body">Medial Geniculum Body</option>
                          <option value="Medial.Globus.Pallidus">Medial Globus Pallidus</option>
                          <option value="Midline.Nucleus">Midline Nucleus</option>
                          <option value="Optic.Tract">Optic Tract</option>
                          <option value="Pulvinar">Pulvinar</option>
                          <option value="Putamen">Putamen</option>
                          <option value="Red.Nucleus">Red Nucleus</option>
                          <option value="Substania.Nigra">Substania Nigra</option>
                          <option value="Subthalamic.Nucleus">Subthalamic Nucleus</option>
                          <option value="Ventral.Anterior.Nucleus">Ventral Anterior Nucleus</option>
                          <option value="Ventral.Lateral.Nucleus">Ventral Lateral Nucleus</option>
                          <option value="Ventral.Posterior.Lateral.Nucleus">Ventral Posterior Lateral Nucleus</option>
                          <option value="Ventral.Posterior.Medial.Nucleus">Ventral Posterior Medial Nucleus</option>
                        </optgroup>
                    </select>
                </div>
        </div>
        <div class="col-md-5">
            <h3>Group B</h3>
                <div> 
                    <select data-placeholder="Select Anatomic Locations" style="width:400px;" class="chzn-select-batch" multiple tabindex="6" name ="select2[ ]">
                        <option value=""></option>
                        <optgroup label="Level 1: Hemisphere">
                          <option value="Left.Cerebrum">Left Cerebrum</option>
                          <option value="Right.Cerebrum">Right Cerebrum</option>
                          <option value="Left.Cerebellum">Left Cerebellum</option>
                          <option value="Right.Cerebellum">Right Cerebellum</option>
                          <option value="Left.Brainstem">Left Brainstem</option>
                          <option value="Right.Brainstem">Right Brainstem</option>
                          <option value="Inter.Hemispheric">Inter-Hemispheric</option>
                        </optgroup>
                        <optgroup label="Level 2: Lobe">
                          <option value="Anterior.Lobe">Anterior Lobe</option>
                          <option value="Frontal.Lobe">Frontal Lobe</option>
                          <option value="Frontal-Temporal.Space">Frontal-Temporal Space</option>
                          <option value="Limbic.Lobe">Limbic Lobe</option>
                          <option value="Medulla">Medulla</option>
                          <option value="Midbrain">Midbrain</option>
                          <option value="Occipital.Lobe">Occipital Lobe</option>
                          <option value="Parietal.Lobe">Parietal Lobe</option>
                          <option value="Pons">Pons</option>
                          <option value="Posterior.Lobe">Posterior Lobe</option>
                          <option value="Sub.lobar">Sub-lobar</option>
                          <option value="Temporal.Lobe">Temporal Lobe</option>
                        </optgroup>
                        <optgroup label="Level 3: Gyrus">
                          <option value="Angular.Gyrus">Angular Gyrus</option>
                          <option value="Anterior.Cingulate">Anterior Cingulate</option>
                          <option value="Caudate">Caudate</option>
                          <option value="Cerebellar.Lingual">Cerebellar Lingual</option>
                          <option value="Cerebellar.Tonsil">Cerebellar Tonsil</option>
                          <option value="Cingulate.Gyrus">Cingulate Gyrus</option>
                          <option value="Claustrum">Claustrum</option>
                          <option value="Culmen">Culmen</option>
                          <option value="Culmen.of.Vermis">Culmen of Vermis</option>
                          <option value="Cuneus">Cuneus</option>
                          <option value="Declive">Declive</option>
                          <option value="Declive.of.Vermis">Declive of Vermis</option>
                          <option value="Extra.Nuclear">Extra-Nuclear</option>
                          <option value="Fastigium">Fastigium</option>
                          <option value="Fourth.Ventricle">Fourth Ventricle</option>
                          <option value="Fusiform.Gyrus">Fusiform Gyrus</option>
                          <option value="Inferior.Frontal.Gyrus">Inferior Frontal Gyrus</option>
                          <option value="Inferior.Occipital.Gyrus">Inferior Occipital Gyrus</option>
                          <option value="Inferior.Parietal.Lobule">Inferior Parietal Lobule</option>
                          <option value="Inferior.Semi-Lunar.Lobule">Inferior Semi-Lunar Lobule</option>
                          <option value="Inferior.Temporal.Gyrus">Inferior Temporal Gyrus</option>
                          <option value="Insula">Insula</option>
                          <option value="Lateral.Ventricle">Lateral Ventricle</option>
                          <option value="Lentiform.Nucleus">Lentiform Nucleus</option>
                          <option value="Lingual.Gyrus">Lingual Gyrus</option>
                          <option value="Medial.Frontal.Gyrus">Medial Frontal Gyrus</option>
                          <option value="Middle.Frontal.Gyrus">Middle Frontal Gyrus</option>
                          <option value="Middle.Occipital.Gyrus">Middle Occipital Gyrus</option>
                          <option value="Middle.Temporal.Gyrus">Middle Temporal Gyrus</option>
                          <option value="Nodule">Nodule</option>
                          <option value="Orbital.Gyrus">Orbital Gyrus</option>
                          <option value="Paracentral.Lobule">Paracentral Lobule</option>
                          <option value="Parahippocampal.Gyrus">Parahippocampal Gyrus</option>
                          <option value="Postcentral.Gyrus">Postcentral Gyrus</option>
                          <option value="Posterior.Cingulate">Posterior Cingulate</option>
                          <option value="Precentral.Gyrus">Precentral Gyrus</option>
                          <option value="Precuneus">Precuneus</option>
                          <option value="Pyramis">Pyramis</option>
                          <option value="Pyramis.of.Vermis">Pyramis of Vermis</option>
                          <option value="Rectal.Gyrus">Rectal Gyrus</option>
                          <option value="Subcallosal.Gyrus">Subcallosal Gyrus</option>
                          <option value="Sub.Gyral">Sub-Gyral</option>
                          <option value="Superior.Frontal.Gyrus">Superior Frontal Gyrus</option>
                          <option value="Superior.Occipital.Gyrus">Superior Occipital Gyrus</option>
                          <option value="Superior.Parietal.Lobule">Superior Parietal Lobule</option>
                          <option value="Superior.Temporal.Gyrus">Superior Temporal Gyrus</option>
                          <option value="Supramarginal.Gyrus">Supramarginal Gyrus</option>
                          <option value="Thalamus">Thalamus</option>
                          <option value="Third.Ventricle">Third Ventricle</option>
                          <option value="Transverse.Temporal.Gyrus">Transverse Temporal Gyrus</option>
                          <option value="Tuber">Tuber</option>
                          <option value="Tuber.of.Vermis">Tuber of Vermis</option>
                          <option value="Uncus">Uncus</option>
                          <option value="Uvula">Uvula</option>
                          <option value="Uvula.of.Vermis">Uvula of Vermis</option>
                        </optgroup>
                        <optgroup label="Level 4: Tissue Type">
                          <option value="Cerebro.Spinal.Fluid">Cerebro-Spinal Fluid</option>
                          <option value="Gray.Matter">Gray Matter</option>
                          <option value="White.Matter">White Matter</option>
                        </optgroup>
                        <optgroup label="Level 5: Cell Type">
                          <option value="Amygdala">Amygdala</option>
                          <option value="Anterior.Commissure">Anterior Commissure</option>
                          <option value="Anterior.Nucleus">Anterior Nucleus</option>
                          <option value="Caudate.Body">Caudate Body</option>
                          <option value="Caudate.Head">Caudate Head</option>
                          <option value="Caudate.Tail">Caudate Tail</option>
                          <option value="Corpus.Callosum">Corpus Callosum</option>
                          <option value="Dentate">Dentate</option>
                          <option value="Hippocampus">Hippocampus</option>
                          <option value="Hypothalamus">Hypothalamus</option>
                          <option value="Lateral.Dorsal.Nucleus">Lateral Dorsal Nucleus</option>
                          <option value="Lateral.Geniculum.Body">Lateral Geniculum Body</option>
                          <option value="Lateral.Globus.Pallidus">Lateral Globus Pallidus</option>
                          <option value="Lateral.Posterior.Nucleus">Lateral Posterior Nucleus</option>
                          <option value="Mammillary.Body">Mammillary Body</option>
                          <option value="Medial.Dorsal.Nucleus">Medial Dorsal Nucleus</option>
                          <option value="Medial.Geniculum.Body">Medial Geniculum Body</option>
                          <option value="Medial.Globus.Pallidus">Medial Globus Pallidus</option>
                          <option value="Midline.Nucleus">Midline Nucleus</option>
                          <option value="Optic.Tract">Optic Tract</option>
                          <option value="Pulvinar">Pulvinar</option>
                          <option value="Putamen">Putamen</option>
                          <option value="Red.Nucleus">Red Nucleus</option>
                          <option value="Substania.Nigra">Substania Nigra</option>
                          <option value="Subthalamic.Nucleus">Subthalamic Nucleus</option>
                          <option value="Ventral.Anterior.Nucleus">Ventral Anterior Nucleus</option>
                          <option value="Ventral.Lateral.Nucleus">Ventral Lateral Nucleus</option>
                          <option value="Ventral.Posterior.Lateral.Nucleus">Ventral Posterior Lateral Nucleus</option>
                          <option value="Ventral.Posterior.Medial.Nucleus">Ventral Posterior Medial Nucleus</option>
                        </optgroup>
                    </select>
                </div>
        </div>
        <div class="col-md-2" style="padding-top: 54px">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </form>

    </div>

    <script>
    function displayVals() {
        var groupA = $( "#select1[]" ).val() || [];
        var groupB = $( "#select2[]" ).val() || [];
        $( "p" ).html( "<b>A:</b> " + groupA.join( ", " ) +
        " <b>B:</b> " + groupB.join( ", " ) );
    }

    $( "select" ).change( displayVals );
    displayVals();

    </script>

<script type="text/javascript">
$(document).ready(function() {
	//autocomplete
	$(".auto").autocomplete({
		source: "search.php",
		minLength: 1,
		messages: {
        		noResults: '',
        		results: function() {}
    		}
	});				
});
</script>

<script>
        dojo.ready(function() {
            dojo.query(".chzn-select").chosen();
            dojo.query(".chzn-select-deselect").chosen({allow_single_deselect:true});
            dojo.query(".chzn-select-batch").chosen({batch_select:true});
            var updateLink = dojo.byId("updateLink");

            dojo.connect(updateLink, 'onclick', function() {
                dojo.query('#select4 > option').forEach(function(optionTag) {
                    if (optionTag.innerHTML) {
                        var values = optionTag.innerHTML.split(" ");

                        var newValue = values[values.length - 1];

                        for (var i = 0; i <= values.length - 2; i++) {
                            newValue = newValue + " "  + values[i] ;
                        }

                        optionTag.innerHTML = newValue;
                    }
                });

                var select_object = dojo.byId('select4');
                dojo.publish('liszt:updated', [select_object]);
            });
            
            var updateLink2= dojo.byId("updateLink2");
            dojo.connect(updateLink2, 'onclick', function() {
                dojo.query('#select2 > option').forEach(function(optionTag) {
                    if (optionTag.innerHTML) {                       
                        optionTag.value = optionTag.value.split("").reverse().join("");
                        optionTag.innerHTML = optionTag.innerHTML.split("").reverse().join("");
                    }
                });
                var select_object = dojo.byId('select2');
                dojo.publish('liszt:updated', [select_object]);
            });            
        });
        
        function multiple_select_change() {
            var select_object = dojo.byId('select2');
            var select_div = dojo.byId('multiple_msg');
           
            var selected_values = [];
           
            for (x=0;x<=select_object.length;x++) {
                if (select_object[x] && select_object[x].selected) {
                    selected_values.push(select_object[x].value);
                }
            }      
            
             select_div.innerHTML = 'Selected value = ' + selected_values;
        }
        
        

    </script>
    

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>	
  

            </div>
        </div>
</section>        
    <div class="push"></div>
  </div><!--/.wrapper-->

  <div class="footer">
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2014 <a target="_blank" title="Stanford University">Stanford University</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    </div><!--/.footer-->

</body>
</html>
