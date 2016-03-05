<?php

include('config.php');

if (isset($_GET['gene'])){
	$nprobes = 0;
        $probeNames = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    
	    $stmt = $conn->prepare('SELECT probe_set_id FROM probes WHERE gene_symbol LIKE :gene');
	    $stmt->execute(array('gene' => '%'.$_GET['gene'].'%'));
	    
            $gene = $_GET['gene'];

	    while($row = $stmt->fetch()) {
	         $probey = $row['probe_set_id'];
                 $high = 'data/' . $gene . '_' . $probey . '/' . $gene . '_' . $probey . '_high.nii.gz';
 
		if (file_exists($high)) {
		   // Add to count
		   $nprobes = $nprobes + 1;  
                   $probeNames[] = $probey; 
                 }
	    }


    // For each set of probes, create a viewer
    echo "<!-- Imaging Data -->"; 
    
	for ($x=0; $x<=$nprobes; $x++)
	  {
          //This is the probe name
          $pname = $probeNames[$x];
         
	  echo	'<div class="row">';
	  echo '<h3>' . $pname . '</h3>';
	  echo '<div class="viewer' . $x . '" style="padding-left: 20px">';
	  echo	'<div class="row">';
	  echo	'<div class="col-md-4">';
			echo    '<div class="view" id="view_coronal1" style="width:270px">';
			echo    '<canvas height="264" id="cor_canvas" width="220"> </canvas>';
			echo    '    <div class="slider nav-slider-vertical" id="nav-zaxis"></div>';
			echo    '    </div>';
		    echo '</div>';
		    echo '<div class="col-md-4">';
			echo '<div class="view" id="view_axial1" style="width:270px">';
			echo '    <canvas height="264" id="axial_canvas" width="220"></canvas>';
		        echo '    <div class="slider nav-slider-vertical" id="nav-zaxis"></div>';
                        echo '    </div>';
		    echo '</div>';
		    echo '<div class="col-md-4">';
			echo '    <div class="view" id="view_sagittal1" style="width:270px">';
			echo '    <canvas height="264" id="sag_canvas" width="290"></canvas>';
		        echo '    <div class="slider nav-slider-horizontal" id="nav-zaxis"></div>';
		        echo '    </div>';
                    echo '</div>';
                echo '</div> <!-- End rows with viewer-->'; 

	  } 


	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}

}


?>
