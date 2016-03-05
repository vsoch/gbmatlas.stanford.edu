<!DOCTYPE html>
<html lang="en">
   <head>
      <?php header('Access-Control-Allow-Origin: *'); ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>GBM-Atlas</title>
       <link rel="stylesheet" href="css/rwd-table.min.css">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/prettyPhoto.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <script src="js/jquery.js"></script>
    <script src="js/spin.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.prettyPhoto.js"></script>
      <script src="js/main.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojo/dojo.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.2/dojo/NodeList-traverse.js"></script>
      <script src="js/chosen-dojo.js"></script>
      <!-- add json2html; both the core library and the jquery wrapper -->
       <script type="text/javascript" src="js/json2html.js"></script>
      <script type="text/javascript" src="js/jquery.json2html.js"></script>
       <script type="text/javascript" src="js/rwd-table.js"></script>
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
   </head>
   <!--/head-->
   <body>
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
                  </li>
                  <li><a href="contact.html">Contact</a></li>
               </ul>
            </div>
         </div>
      </header>
      <!--/header-->
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
      </section>
      <!--/#title-->
      <div class="push_entire_service_section_upwards" style="padding-top: -10px">
         <section id="services">
            <div class="container">
               <div class="row" style="padding-top: 20px; padding-left: 17px;">
                  <label>Anatomic Search</label>
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
               <?php 
                  $select1 = $_POST['select1'];
                  sort($select1);
                  $select2 = $_POST['select2'];
                  sort($select2);
                  ?>
               <div class="extra_styling" style="padding-left: 13px">
                  <div class = "row">
                     <div class = "selection">
                        
                           <h3>Group A Regions:</h3>
                           <p><?php echo implode(", ", $select1) ?></p>
                           
                           <h3>Group B Regions:</h3>
                           <p><?php echo implode(", ", $select2) ?></p>
                     </div>
                  </div>
                  <div class = "row" id = "spinner" style = "position: relative; height: 200px;"><h5 style="text-align: center;">Please wait for the computation, which will complete in under 30 seconds.</h5></div>
                  <div class = "row">
                      <div class="table-responsive">
                         <table id = "IDs" class="table table-small-font table-bordered table-striped">
                         </table>
                      </div>
                  </div>
               </div><!--/.extra_styling-->
               <script> 
                   
                   var opts = {
                     lines: 7, // The number of lines to draw
                     length: 0, // The length of each line
                     width: 30, // The line thickness
                     radius: 30, // The radius of the inner circle
                     corners: 1, // Corner roundness (0..1)
                     rotate: 0, // The rotation offset
                     direction: 1, // 1: clockwise, -1: counterclockwise
                     color: '#000', // #rgb or #rrggbb or array of colors
                     speed: 1, // Rounds per second
                     trail: 60, // Afterglow percentage
                     shadow: false, // Whether to render a shadow
                     hwaccel: false, // Whether to use hardware acceleration
                     className: 'spinner', // The CSS class to assign to the spinner
                     zIndex: 2e9, // The z-index (defaults to 2000000000)
                     top: '50%', // Top position relative to parent
                     left: '50%' // Left position relative to parent
                   };
                  var target = document.getElementById('spinner');
                  var spinner = new Spinner(opts).spin(target);
               </script>
               <script type="text/javascript">
                  $(document).ready(function() {
                    $(".spinner").show();
                   //Function to get groups from URL
                   function GetUrlValue(VarSearch){
                       var SearchString = window.location.search.substring(1);
                       var VariableArray = SearchString.split('&');
                           var result = [];
                       for(var i = 0; i < VariableArray.length; i++){
                     var KeyValuePair = VariableArray[i].split('=');
                     if(KeyValuePair[0] == VarSearch){
                                     result.push(KeyValuePair[1]);
                     }
                       }
                              return result;
                   }
                  
                    var group1 = "<?php echo implode(",", $select1) ?>";
                    var group2 = "<?php echo implode(",", $select2) ?>"; 
                  
                    var scriptURL = "";
                    var JSONurl = "";
                  
                    if(group1[0] <= group2[0]) {
                      JSONurl =  "data/json/" + group1 + "XXX" + group2 +".json";
                      scriptURL = "http://gbmatlas.stanford.edu/cgi-bin/Rcgi/gbmanat?group1=" + group1 + "&group2=" + group2;
                    }
                    else {
                      JSONurl =  "data/json/" + group2 + "XXX" + group1 +".json";
                      scriptURL = "http://gbmatlas.stanford.edu/cgi-bin/Rcgi/gbmanat?group1=" + group1 + "&group2=" + group2;
                    }
                    console.log("script URL" + scriptURL);
                  
                  
                   function checkInDB(getGroups, toTables){
                      var result = null;
                      $.ajax({
                        url: JSONurl,
                        type: 'get',
                        success: function(data)
                        {
                          document.getElementById('spinner').style.display = 'none';
                          $(".spinner").hide();
                           spinner.stop();
                          //console.log("FOUND");
                          //console.log(data);
                          toTables(data);
                          //file exists
                        },
                        error: function(data)
                        {
                          //console.log(data);
                          //console.log(JSONurl);
                          //console.log("COULD NOT FIND");
                          getGroups(toTables);
                          //file not exists
                        }
                  
                      });
                    }
                  
                   //var group1 = GetUrlValue('select1');
                   //var group2 = GetUrlValue('select2');
                  
                    //var url = "http://localhost/cgi-bin/R/gbmanat?group1=" + group1 + "&group2=" + group2;
                  
                          //Get them probes!
                   function getGroups(toTables){
                     console.log("GETTING GROUPS");
                     var result = null;
                     $.ajax({
                     url: scriptURL,
                     type: 'get',
                     dataType: 'json',
                     async: true,
                     success: function(data){
                       document.getElementById('spinner').style.display = 'none';
                       $(".spinner").hide();
                       //console.log('DONE');
                       //console.log(data);
                       toTables(data);
                     }
                     });
                   }
                  
                   data = checkInDB(getGroups, toTables);
                   //data = getGroups(toTables);
                  
                    function toTables(data){
                      console.log("TOTABLES");
                      var row = $("<tr />");
                      $("#IDs").append(row); 
                      row.append("<th>Probe</th>");
                      row.append("<th>PValue</th>");
                      row.append("<th>PValue Adjusted</th>");
                      row.append("<th>Up/Down Regulated</th>");
                  
                      for (var i=1; i <= Object.keys(data).length; i++)
                      {
                        var row = $("<tr />")
                        $("#IDs").append(row); 
                     
                        var probeID = "row.append($(\"<td>\" + data.X" + i + ".ProbeID + \"</td>\"));";
                        eval(probeID);
                        
                        var pValue = "row.append($(\"<td>\" + data.X" + i + ".pval + \"</td>\"));";
                        eval(pValue);
                        
                        var pValueAdjusted = "row.append($(\"<td>\" + data.X" + i + ".qval + \"</td>\"));";
                        eval(pValueAdjusted);
                        
                        var Up_Down = "row.append($(\"<td>\" + data.X" + i + ".direction + \"</td>\"));";
                        eval(Up_Down);
                      }
                    }
                         
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
      </div><!--/.push_entire_service_section_upwards-->
      <section id="bottom" class="wet-asphalt">
      </section>
      <!--/#bottom-->
      <footer id="footer" class="midnight-blue">
         <div class="container">
            <div class="row">
               <div class="col-sm-6">
                  &copy; 2014 <a target="_blank" title="Stanford University">Stanford University</a>. All Rights Reserved.
               </div>
               <div class="col-sm-6">
                  <ul class="pull-right">
                     <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li>
                     <!--#gototop-->
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <!--/#footer-->
   </body>
</html>
