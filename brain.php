<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Brain Map - GBM-Atlas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

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
                    <li class="active"><a href="about.html">About</a></li>
                    <li><a href="publications.html">Publications</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </header><!--/header-->

    <!-- Here is the preloader-->
    <section id="title" class="orange">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Brain Map</h1>
                    <p>Visualize gene expression for a gene probe</p>
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
        <div class="row">
	  <div class="col-sm-6">
	    <div class="dropdown">

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
</script>
  		
    <?php

        if (isset($_GET['gene'])){
           if (isset($_GET['probe'])){
                $geneID = $_GET['gene'];
                $probeID = $_GET['probe'];

                $lowfile = "video/" . $geneID . "_" . $probeID . "/" . $geneID . "_" . $probeID . "_low.mp4";
                $highfile = "video/" . $geneID . "_" . $probeID . "/" . $geneID . "_" . $probeID . "_high.mp4";

                // Check if the file exists
                if (file_exists($lowfile)) {
                  // Print header for the gene
                  echo "<h2>$geneID : $probeID Low Expression</h2>";
                  // Here is the low video
                  echo '<div class="row">';
                  echo '<video width="600" controls>';
                  printf('<source src="video/%s_%s/%s_%s_low.mp4" type="video/mp4">', $geneID,$probeID,$geneID,$probeID);
                  echo 'Your Browser does not support the video tag.</video></div>';
                } else {
	            echo '<div class="row"><p>No low expression video was generated for this probe.</p></div>';
                }                
               
               if (file_exists($highfile)) {
                 // Here is the high video
                  echo "<h2>$geneID : $probeID High Expression</h2>";
                  echo '<div class="row">';
                  echo '<video width="600" controls>';
                  printf('<source src="video/%s_%s/%s_%s_high.mp4" type="video/mp4">', $geneID,$probeID,$geneID,$probeID);
                  echo 'Your browser does not support the video tag</video></div>';
                } else {
                    echo '<div class="row"><p>No high expression video was generated for this probe.</p></div>';
                }
            }
        }
        ?>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>	

</div><!-- dropdown-->
</div><!--column-->
</section>
</div>
      
<section id="bottom" class="wet-asphalt">
         </section><!--/#bottom-->

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

</body>
</html>
